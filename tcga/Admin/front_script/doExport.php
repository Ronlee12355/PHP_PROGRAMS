<?php
    require_once __DIR__.'/PHPExcel.php';
    require_once __DIR__.'/PHPExcel/IOFactory.php';
    require_once __DIR__.'/PHPExcel/Reader/Excel5.php';
    date_default_timezone_set('PRC');
    require_once str_replace('\\','/',dirname(dirname(__DIR__))).'/Login/pdo.php';
    $pdo=DB::getInstance()->getDB();
    function replace_br($str){
        return str_replace('<br />',"\r\n",$str);
    }


    $data=$pdo->query('SELECT username,age,gender,nation,ID_card,number_hospital,hospital,cancer_type,smoke_year,TNM,PTNM,
diagnosis_desc,operation_desc,formal_disease,chem_treat,x_treat,drug_treat,after_x_treat,time_confirm,died,time_dead,dead_reason,last_update FROM pm_diagnosis INNER JOIN pm_paient ON pm_diagnosis.user_id = pm_paient.user_id WHERE pm_diagnosis.status=1')->fetchAll();

    $objPHPExcel=new PHPExcel();
    $headArr=array('病人姓名','年龄','性别','民族','身份证号','住院号','就诊医院','癌症分型','抽烟史','TNM','PTNM','诊断描述','手术描述','既往病史',
        '化疗史','放疗史','药物治疗方案','化疗后状态','确诊时间','是否死亡','死亡时间','死亡原因','最后更新时间');
    $date=date("Y_m_d",time());
    $fileName= "病人数据_{$date}.xlsx";

    //设置表头
    $key=ord('A');
    foreach ($headArr as $head){
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue(chr($key).'1',$head);
        $key+=1;
    }

    $column=2;
    $objActSheet=$objPHPExcel->getActiveSheet();
    foreach ($data as $k=>$value){
        $span = ord("A");
        $value=array_map('replace_br',$value);
        foreach ($value as $key=>$v){
            if($key == 'last_update'){
                $v=date('Y-m-d H:i:s',$v);
            }
            $objActSheet->setCellValue(chr($span).$column,$v);
            $span++;
        }
        $column++;
    }
    $fileName=iconv('utf-8','gb2312',$fileName);
    $objPHPExcel->setActiveSheetIndex(0);
    ob_end_clean();
    ob_start();
    header('Content-Type: application/vnd.ms-excel');
    header("Content-Disposition: attachment;filename=\"$fileName\"");
    header('Cache-Control: max-age=0');
    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
    $objWriter->save('php://output');
    exit;