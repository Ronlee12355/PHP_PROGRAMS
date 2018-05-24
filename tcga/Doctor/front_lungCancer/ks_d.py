import os
import sys
import time

import pandas as pd
import numpy as np
import scipy as sp
import networkx as nx

from collections import OrderedDict
from itertools import combinations
from scipy import stats


current_dir = os.path.dirname(os.path.abspath(__file__))
lung_dir = os.path.join(current_dir, "lungcancer-targets-all")


def ks_2samp(data1, data2, alternative='less'):

    data1, data2 = map(np.asarray, (data1, data2))
    n1 = data1.shape[0]
    n2 = data2.shape[0]
    en = np.sqrt(n1 * n2 / float(n1 + n2))
    data1 = np.sort(data1)
    data2 = np.sort(data2)
    data_all = np.concatenate([data1, data2])
    cdf1 = np.searchsorted(data1, data_all, side='right')/(1.0*n1)
    cdf2 = (np.searchsorted(data2, data_all, side='right'))/(1.0*n2)

    if alternative == 'two-sided':
        d = np.max(np.absolute(cdf1 - cdf2))
        # Note: d absolute not signed distance
        try:
            prob = stats.distributions.kstwobign.sf(
                (en + 0.12 + 0.11 / en) * d)
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


def ks_test(patient_file, target):

    rank = []
    for i in open(patient_file):
        rank.append(i.split('\t')[0])
    rank = pd.Series(rank)

    sample_rank = rank[rank.isin(targets)]
    if sample_rank.empty:
        # print("{} targets not in rank".format(d))
        p = 1  # Use largest P values here
    else:
        p = ks_2samp(rank.index, sample_rank.index, 'less')[1]
    return -np.log10(p)


if __name__ == "__main__":

    indrugs, patient_file= sys.argv[1:]

    # 此处要确定药物靶标文件
    dt_file = os.path.join(current_dir,
            "DGIDB+DGIDB+TTD+DRUGBANK_drug-target_xx.txt")
    drug_target = pd.read_csv(dt_file, sep="\t", header=None, index_col=0,
                              encoding='latin-1')[1]
    indrugs = indrugs.strip().split(sep="@@@")
    targets = drug_target[indrugs].values
    # 假设之前一步保存了每个病人的rank文件
    ks = ks_test(patient_file, targets)
    print(ks)
   
"""
   网站已经保证所有药在靶标药物文件中
    indrugs_in = []
    for i in indrugs:
        if i not in drug_target:
            # 此处与-logP为0的药，应注意
            print("Drug has no target information")
        else:
            indrugs_in.append(i)

    # 如果没有找到任何一个药物的靶标
    if not indrugs_in:
        sys.exit("None of name recognized")
"""

