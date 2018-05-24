import os, sys, time

import pandas as pd
import numpy as np
import scipy as sp
import networkx as nx

from collections import OrderedDict
from itertools import combinations
from scipy import stats


current_dir = os.path.join(os.path.dirname(os.path.abspath(__file__)), "lungcancer-targets-all")


def ks_2samp(data1, data2, alternative='less'):
    
    data1, data2 = map(np.asarray, (data1, data2))
    n1 = data1.shape[0]
    n2 = data2.shape[0]
    en = np.sqrt(n1 * n2 / float(n1 + n2))
    data1 = np.sort(data1)
    data2 = np.sort(data2)
    data_all = np.concatenate([data1,data2])
    cdf1 = np.searchsorted(data1,data_all,side='right')/(1.0*n1)
    cdf2 = (np.searchsorted(data2,data_all,side='right'))/(1.0*n2)
    
    if alternative == 'two-sided':
        d = np.max(np.absolute(cdf1 - cdf2))
        # Note: d absolute not signed distance
        try:
            prob = stats.distributions.kstwobign.sf((en + 0.12 + 0.11 / en) * d)
        except:
            prob = 1.0
    elif alternative == 'greater':
        d = np.max(cdf1 - cdf2)
    elif alternative == 'less':
        d = np.max(cdf2 - cdf1)
    if alternative in ['less', 'greater']:
        lambd = (en + 0.12 + 0.11 / en) * d
        prob = np.exp(-2 * lambd * lambd)
    
    return d, prob


def ks_test(rank, dt_file):

    drug_target = pd.read_csv(dt_file, sep="\t", header=None, index_col=0)[1]
    rank = pd.Series(rank)
    ps = {}

    for d in drug_target.index.unique():
        d_t = drug_target[d]
        
        if isinstance(d_t, str):
            sample_rank = rank[rank==d_t]
        else:
            sample_rank = rank[rank.isin(d_t)]
        
        if sample_rank.empty:
            # print("{} targets not in rank".format(d))
            p = 1  # Use largest P values here
        else:
            p = ks_2samp(rank.index, sample_rank.index, 'less')[1]
        ps[d] = -np.log10(p)
    return pd.Series(ps).sort_values(ascending=False)

    
    
def read_ppi():

    f=os.path.join(os.path.dirname(current_dir), 'human_string_ppi_400.txt')
    g = nx.Graph()
    for line in open(f):
        g.add_edges_from([[i.upper() for i in line.split()[:2]]])
    
    return g


def to_conn_matrix(ppi, genes):
    
    n = len(genes)
    c=0
    conn = sp.sparse.lil_matrix((n, n))
    for i,j in combinations(genes, 2):
        c+=1
        if ppi.has_edge(i, j):
            conn[genes[i], genes[j]]=1
    
    return conn
    
        
def generank(net, fold, d):
    """ 
    input data: 
    net: connectivity  matrix (zero/one, symmetric with zero diag)
    fold: vector of expression levels (non-negative)                
    d: parameter in algorithm
    
    output is   
    r: vector of rankings 
    """
    fold = abs(fold)
    norm_ex = fold/max(fold)
    degrees = net.sum(axis=1)
    degrees[degrees==0] = 1
    degrees = np.array(degrees)[:, 0]
    D1 = sp.sparse.csr_matrix(np.diag(1./degrees))
    A = np.eye(net.shape[0]) - d*np.dot(net.T, D1)
    b = (1-d)*norm_ex
    r = np.linalg.solve(A, b)
    
    return r

def run_rank(expr, outpath):
    
    start = time.time()
    # print("processing data...")
    ppi = read_ppi()
    genes = OrderedDict([(j, i) \
                         for i, j in enumerate(expr.index)])
    conn = to_conn_matrix(ppi, genes)
    conn = conn + conn.T
    
    # print("running gene rank...")
    fold = expr.values
    rank_new = generank(conn, fold, 0.5)
    pro_rank = sorted(zip(rank_new, genes), reverse=True)       

    # output generank
    name = os.path.join(outpath, 'generank.txt')
    w = open(name, 'w')
    for i in pro_rank:
        w.write("{}\t{}\n".format(i[1], i[0]))
    w.close()

    rank = [i for _,i in pro_rank]
        
    end = time.time()
    # print("{}h elased".format((end - start)/3600))
    return rank        

def read_file(filename):
    """Read input fold change"""
    fd = {}
    for line in open(filename):
        gene, expr = line.split()
        fd[gene] = float(expr)
    return pd.Series(fd)


def to_fd(filename):
    """Calculate fd"""
    control = read_file(os.path.join(os.path.dirname(current_dir), 'TCGA-LUAD_normal_FPKM.txt'))
    case = read_file(filename)
    control = control[control != 0]
    case = case[case != 0]
    return (case/control).dropna().apply(np.log2)


def read_ddi(filename):

    ddi = {}
    for i in open(filename):
        items = [j.strip() for j in i.split(sep="\t")]
        ddi.setdefault(items[0], []).append(items[1])
    return ddi


def drug_recommend(ks, filename, ddi=None):
    """Output drug recommendation results"""
    out = open(filename, "w")
    for d, p in ks.items():
        if ddi:
            for eff in ddi[d]:
                if not eff:
                    eff = "None"
                out.write("{}\t{}\t{}\n".format(d, p, eff))
        else:
            out.write("{}\t{}\n".format(d, p))
    out.close()


if __name__ == "__main__":
    
    infile, outpath = sys.argv[1:]
    # fd = to_fd("lung_counts_rpkm_all.txt")  # read fold change
    fd = to_fd(infile)  # Or given a filename in bash
    rank = run_rank(fd, outpath)  # run generank

    # run ks test
    app_ks = ks_test(rank, os.path.join(current_dir, '1-LUNG_app.txt'))
    relocation_ks = ks_test(rank, os.path.join(current_dir, '2-LUNG_relocation.txt'))
    app_app_ks = ks_test(rank, os.path.join(current_dir, '3-LUNG_app-app.txt'))
    app_relocation_ks = ks_test(rank, os.path.join(current_dir, '4-LUNG_app-relocation.txt'))

    # read_ddi
    app_app_ddi = read_ddi(os.path.join(current_dir, "DDI-3-fitness-hotnet-ddi.txt"))
    app_relocation_ddi = read_ddi(os.path.join(current_dir, "DDI-4-fitness-hotnet-ddi.txt"))

    # output results
    drug_recommend(app_ks, os.path.join(outpath,
        "app_ks_drug_recommendation.txt"))
    drug_recommend(relocation_ks, os.path.join(outpath,
        "relocation_ks_drug_recommendation.txt"))
    drug_recommend(app_app_ks,
            os.path.join(outpath,
                "app_app_ks_drug_recommendation.txt"), app_app_ddi)
    drug_recommend(app_relocation_ks, os.path.join(outpath,
        "app_relocation_ks_drug_recommendation.txt"), app_relocation_ddi)
    print(os.path.join(outpath, 'generank.txt'))
