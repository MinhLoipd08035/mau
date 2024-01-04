<?php
function thongke()
{
   $sql = "select loai_hang.ma_loai as ma_loaihang , loai_hang.ten_loai as ten_loaihang, count(hang_hoa.ma_hh) as so_luong_sp , min(hang_hoa.con_hh) as gia_thap_nhat,max(hang_hoa.con_hh) as gia_cao_nhat ,avg(hang_hoa.con_hh) as gia_trung_binh ";
   $sql.= " from hang_hoa left join loai_hang on loai_hang.ma_loai=hang_hoa.ma_loai"; 
   $sql.= " group by loai_hang.ma_loai order by loai_hang.ma_loai";
    $danhsach_thongke = pdo_query($sql);
    return $danhsach_thongke;
}
