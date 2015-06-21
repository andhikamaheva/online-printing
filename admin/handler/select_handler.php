<?php
include "connection_handler.php"; 

if(isset($_GET['t'])){
	if($_GET['t']=='imgByr'){
		$transaksi_ID=$_POST["transaksi_ID"];

		$query="SELECT transaksi_payment FROM transaksi WHERE md5(transaksi_ID)='".$transaksi_ID."'";
		$result=mysqli_query($conn,$query);
		$data=mysqli_fetch_array($result);
		$return='<a href="data:image/png;base64,'.base64_encode($data[0]).'" target="_blank"><img src="data:image/png;base64,'.base64_encode($data[0]).'" class="img-thumbnail" /></a>';
	}elseif($_GET['t']=='pelDash'){
		$query="select member.member_name as member, ifnull(m.masuk,0) as masuk, ifnull(jt.jtrans,0) as jtrans, date(m.tr) as tr, ifnull(tl.tolak,0) as tlk from
				member left join (select t.member_member_username as member, sum(td.quantity*td.price) as masuk, max(t.transaksi_close) as tr
				from transaksi t join transaksi_det td on t.transaksi_ID=td.transaksi_ID
				where transaksi_approve and transaksi_close is not null group by t.member_member_username) as m
				on member.member_username=m.member left join (select member_member_username as member, count(transaksi_ID) as jtrans
				from transaksi where transaksi_approve and transaksi_close is not null
				group by member_member_username) as jt
				on m.member=jt.member left join
				(select member_member_username as member, count(transaksi_ID) as tolak
				from transaksi where transaksi_approve is null and transaksi_close is not null
				group by member_member_username) as tl
				on jt.member=tl.member
				ORDER BY masuk desc,2,1";
		$return='';
		$return.='<div class="row one-list-message">';
			$return.='<div class="col-xs-1"><i class="fa fa-users"></i></div>';
			$return.='<div class="col-xs-5"><b>Nama</b></div>';
			$return.='<div class="col-xs-1">Terima</div>';
			$return.='<div class="col-xs-1">Tolak</div>';
			$return.='<div class="col-xs-2">Pemasukan</div>';
			$return.='<div class="col-xs-1">Terakhir</div>';
		$return.='</div>';
		$result=mysqli_query($conn,$query);
		while ($row = mysqli_fetch_assoc($result)) {
			$return.='<div class="row one-list-message">';
				$return.='<div class="col-xs-1"><i class="fa fa-user"></i></div>';
				$return.='<div class="col-xs-5"><b>'.$row["member"].'</b></div>';
				$return.='<div class="col-xs-1">'.$row["jtrans"].'</div>';
				$return.='<div class="col-xs-1">'.$row["tlk"].'</div>';
				$return.='<div class="col-xs-2">Rp'.number_format($row['masuk'],0,'','.').'</div>';
				$return.='<div class="col-xs-1 message-date">'.( $row["tr"]=="" ? "Tidak Pernah" : date("d / m / Y", strtotime($row["tr"])) ).'</div>';
			$return.='</div>';
		}
	}elseif($_GET['t']=='penDash'){
		$query="SELECT sd.service_name, i.size, IFNULL(k.jml,0) as kemarin,
				i.jml as ini, 
				CAST(((i.jml-IFNULL(k.jml,0))/IFNULL(k.jml,1))*100 as DECIMAL(4,0)) as prosentase
				FROM
				(SELECT td.service_ID as id, td.size as size, sum(td.quantity) as jml
				FROM transaksi_det td left join transaksi t on td.transaksi_ID=t.transaksi_ID
				WHERE date(t.transaksi_open)=date(now()) group by td.service_ID, td.size) as i
				LEFT JOIN
				(SELECT td.service_ID as id, td.size as size, sum(td.quantity) as jml
				FROM transaksi_det td left join transaksi t on td.transaksi_ID=t.transaksi_ID
				WHERE date(t.transaksi_open)=subdate(date(now()),1) group by td.service_ID, td.size) as k
				ON i.id=k.id and i.size=k.size
				LEFT JOIN
				service_det sd ON i.id=sd.service_ID";
				
		$return='';
		$result=mysqli_query($conn,$query);
		while ($row = mysqli_fetch_assoc($result)) {
			$perubahan=($row["prosentase"]>-1 ? '<i class="fa fa-chevron-up"></i>' : '<i class="fa fa-chevron-down"></i>');
			$prosentase=str_replace("-","",$row["prosentase"]);
			$return.= '<tr>';
				$return.= '<td class="m-ticker"><b>'.$row["service_name"].'</b><span><?php echo $row["size"]?></span></td>';
				$return.= '<td class="m-change">'.$row["kemarin"].'</td>';
				$return.= '<td class="m-change">'.$row["ini"].'</td>';
				$return.= '<td class="m-change">'.$perubahan.' '.$prosentase.'%</td>';
			$return.= '</tr>';
		}
	}elseif($_GET['t']=='statDash'){
		$array=array();
		$query="SELECT a.da as period, ifnull(a.app,0) as Diproses, ifnull(b.cls,0) as Ditolak from 
				(SELECT count(transaksi_approve) as app, date(transaksi_approve) da
				from transaksi where transaksi_approve is not null
				group by date(transaksi_approve)) as a left join
				(SELECT count(transaksi_close) as cls, date(transaksi_close) dc
				from transaksi where transaksi_close is not null and transaksi_approve is null
				group by date(transaksi_close)) as b on
				a.da=b.dc LIMIT 7";
		$result=mysqli_query($conn,$query);
		while ($row = mysqli_fetch_assoc($result)) {
			$array[]=$row;
		}
		$return=json_encode($array);
	}elseif($_GET['t']=='statDonut'){
		session_start();
		$array=array();
		$user=$_SESSION['admin']['admin_username'];
		$query="SELECT ROUND(a.tr/b.semua*100) as ptr, ROUND((b.semua-a.tr)/b.semua*100) as sisa FROM
				(SELECT admin_admin_username AS un, count(transaksi_ID) AS tr
				FROM transaksi WHERE transaksi_approve IS NOT NULL 
				AND admin_admin_username='".$user."' group by un) 
				AS a, 
				(SELECT count(transaksi_ID) AS semua
				FROM transaksi where transaksi_approve is NOT NULL) 
				as b";
		$result=mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		$array[0]=array("value"=>$row['ptr'],"label"=>"Anda","formatted"=>"Memproses ".$row['ptr']."%");
		$array[1]=array("value"=>$row['sisa'],"label"=>"Lainnya","formatted"=>"Memproses ".$row['sisa']."%");
		$return=json_encode($array);
		
	}elseif($_GET['t']=='statDonut1'){
		session_start();
		$array=array();
		$user=$_SESSION['admin']['admin_username'];
		$query="SELECT ROUND(a.tr/b.semua*100) as ptr, ROUND((b.semua-a.tr)/b.semua*100) as sisa FROM
				(SELECT admin_admin_username AS un, count(transaksi_ID) AS tr
				FROM transaksi WHERE transaksi_approve IS NULL and transaksi_close IS NOT NULL 
				AND admin_admin_username='".$user."' group by un) 
				AS a, 
				(SELECT count(transaksi_ID) AS semua
				FROM transaksi where transaksi_approve is NULL and transaksi_close IS NOT NULL) 
				as b";
		$result=mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		$array[0]=array("value"=>$row['ptr'],"label"=>"Anda","formatted"=>"Memproses ".$row['ptr']."%");
		$array[1]=array("value"=>$row['sisa'],"label"=>"Lainnya","formatted"=>"Memproses ".$row['sisa']."%");
		$return=json_encode($array);
	}
	echo $return;
}
mysqli_close($conn);
?>
