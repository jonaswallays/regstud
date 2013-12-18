<?php
$oplMW = array('OP'=>'Orthopedagogie','SW'=>'Sociaal werk', 'KO'=>'Kleuteronderwijs','LO'=>'Lager onderwijs','SO'=>'Secundair onderwijs',
        'BML'=>'Biomedische laboratoriumtechnologie', 'ET'=>'Ergotherapie','LA'=>'Logopedie en audiologie', 'VPL'=>'Verpleegkunde','VD'=>'Voedings- en dieetkunde');
$kMW = array(
        'AO'=>'Algemene orthopedagogie','OB'=>'Opvoedingsbegeleiding en -coaching bij kinderen',
        'MW'=>'Maatschappelijk werk','PW'=>'Personeelswerk','SC'=>'Sociaal-cultureel werk','MAD'=>'Maatschappelijke advisering',       
        'ML'=>'Medische laboratoriumtechnologie','FBL'=>'Farmaceutische en biologische laboratoriumtechnologie',
        'LOG'=>'Logopedie','AUD'=>'Audiologie',       
    );
$oplBO = array('BM'=>'Bedrijfsmanagement','OM'=>'Office management','TIN'=>'Toegepaste informatica','REM'=>'Retailmanagement');
$kBO = array('AF'=>'Accountancy-fiscaliteit','FV'=>'Financie- en verzekeringswezen','LM'=>'Logistiek management','KM'=>'KMO-management',
        'MK'=>'Marketing','MM'=>'Milieumanagement','RE'=>'Rechtspraktijk','BVT'=>'Bedrijfsvertaler-tolk','MA'=>'Management assistant',
        'MMA'=>'Medical management assistant');
$oplNT = array('ABT'=>'Agro- en biotechnologie','CH'=>'Chemie','EM'=>'Elektromechanica','HT'=>'Houttechnologie','MT'=>'Modetechnologie',
        'TT'=>'Textieltechnologie','VAS'=>'Vastgoed');
$kNT = array(
        'DZ'=>'Dierenzorg','GM'=>'Groenmanagement','LB'=>'Landbouw','VMT'=>'Voedingsmiddelentechnologie',
        'BCH'=>'Biochemie','CHE'=>'Chemie','MIZ'=>'Milieuzorg',
        'AUT'=>'Automatisering','ELM'=>'Elektromechanica','KLI'=>'Klimatisering',
        'LAM'=>'Landmeten','MAK'=>'Makelaardij'
    );
$oplART = array('IVG'=>'Interieurvormgeving','LTA'=>'Landschaps- en tuinarchitectuur','AVK'=>'Audiovisuele kunsten','DRA'=>'Drama',
        'MUZ'=>'Muziek', 'BEK'=>'Beeldende kunsten','LEK'=>'Specifieke lerarenopleiding in de kunsten');
$kART = array(
        'ANF'=>'Animatiefilm','FIL'=>'Film',
        'UMU'=>'Uitvoerende muziek','KMU'=>'Klassieke muziek','JPM'=>'Jazz/pop muziek',
        'SMU'=>'Scheppende muziek','CMU'=>'Compositie','MUP'=>'Muziekproductie','MTH'=>'Muziektheorie/schriftuur','INS'=>'Instrumentenbouw',
        'VRK'=>'Vrije kunsten','SCK'=>'Schilderkunst','BHK'=>'Beeldhouwkunst','TEK'=>'Tekenen','BEI'=>'Beeld en installatie','MEK'=>'Mediakunst',
        'FOT'=>'Fotografie','MMV'=>'Multimediale vormgeving',
        'GRO'=>'Grafisch ontwerp','GRA'=>'Grafiek','GRV'=>'Grafische vormgeving','WID'=>'Web- en interactief design','ILL'=>'Illustratie',
        'TEO'=>'Textielontwerp','MOD'=>'Mode'
    );
if($_POST){	                           	
   $fname = htmlspecialchars($_POST['txtFirstName']);
   $lname = htmlspecialchars($_POST['txtLastName']);
   $email = htmlspecialchars($_POST['txtEmail']);
   $straat = htmlspecialchars($_POST['txtStraat']);
   $pc = htmlspecialchars($_POST['txtPC']);
   $gemeente = htmlspecialchars($_POST['txtGemeente']);
    if( empty($fname) || empty($lname) || empty($email) ) {
            //|| empty($straat) || empty($pc) || empty($gemeente)) {
	fail('Alle velden zijn verplicht in te vullen.');
    }		
    $regexp = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    if (!preg_match($regexp,$email)) {
                      fail( "Geen correct e-mail.");
    }
     //FMW
    $fac = $opl = $keuze = '';
    foreach ($oplMW as $io=>$o){
         if (isset($_POST[$io])) $opl .='  '.$o;
    };
    foreach ($kMW as $ik=>$k){
         if (isset($_POST[$ik])) $keuze .='  '.$k;
    };
    if ($opl != '' || $keuze != '') {
        $fac = 'Mens en Welzijn';		
        $query = "INSERT INTO seckeuze SET voornaam='$fname', naam='$lname',email='$email',straat='$straat', pc='$pc',gemeente='$gemeente',fac='$fac',opl='$opl',keuze='$keuze',regdate =NOW()";
        $result = db_connection($query);
    }
    //einde FMW
    //FNT
    $fac = $opl = $keuze = '';
    foreach ($oplNT as $io=>$o){
         if (isset($_POST[$io])) $opl .='  '.$o;
    };
    foreach ($kNT as $ik=>$k){
         if (isset($_POST[$ik])) $keuze .='  '.$k;
    };
    if ($opl != '' || $keuze != '') {
        $fac = 'Natuur en Techniek';		
        $query = "INSERT INTO seckeuze SET voornaam='$fname', naam='$lname',email='$email',straat='$straat', pc='$pc',gemeente='$gemeente',fac='$fac',opl='$opl',keuze='$keuze',regdate =NOW()";
        $result = db_connection($query);
    }
    //einde FNT
    //FBO
    $fac = $opl = $keuze = '';
    foreach ($oplBO as $io=>$o){
         if (isset($_POST[$io])) $opl .='  '.$o;
    };
    foreach ($kBO as $ik=>$k){
         if (isset($_POST[$ik])) $keuze .='  '.$k;
    };
    if ($opl != '' || $keuze != '') {
        $fac = 'Bedrijf en Organisatie';		
        $query = "INSERT INTO seckeuze SET voornaam='$fname', naam='$lname',email='$email',straat='$straat', pc='$pc',gemeente='$gemeente',fac='$fac',opl='$opl',keuze='$keuze',regdate =NOW()";
        $result = db_connection($query);
    }
    //einde FBO
    //ART
    $fac = $opl = $keuze = '';
    foreach ($oplART as $io=>$o){
         if (isset($_POST[$io])) $opl .='  '.$o;
    };
    foreach ($kART as $ik=>$k){
         if (isset($_POST[$ik])) $keuze .='  '.$k;
    };
    if ($opl != '' || $keuze != '') {
        $fac = 'School of Arts';		
        $query = "INSERT INTO seckeuze SET voornaam='$fname', naam='$lname',email='$email',straat='$straat', pc='$pc',gemeente='$gemeente',fac='$fac',opl='$opl',keuze='$keuze',regdate =NOW()";
        $result = db_connection($query);
    }
    //einde ART
    if (isset($result)) {
        $msg = $fname." ".$lname." is succesvol toegevoegd." ;
        success($msg);
    } else {
        fail('Er moet minstens één keuze ingegeven worden!');
    }                     
}

if($_GET){
                    if ($_GET['action'] == 'delStudent') {
                                    $query = "DELETE FROM seckeuze where id = {$_GET['id']}";
                                     //success($query);
                                     $result = db_connection($query);
                                     if ($result) {
			$msg = "Student is succesvol verwijderd." ;
			success($msg);
		} else {
			fail('Verwijderen mislukt: '+$result);
		}
		exit;
                        }
                    if($_GET['action'] == 'getStudents'){
		$query = "SELECT distinct naam, fac, opl, keuze,  voornaam, naam, email  FROM seckeuze order by fac, opl, keuze, naam ASC";
		$result = db_connection($query);
		
		$studs = array();

		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			array_push($studs, array('fac' => $row['fac'],'opl' => $row['opl'],'keuze' => $row['keuze'],'voornaam' => $row['voornaam'], 'naam' => $row['naam'], 'email' => $row['email']));
		}
		echo json_encode(array("studs" => $studs));
		exit;
	}
                    }	
	function db_connection($query) {
                                            $dbhost = 'mysqlhost1';
                                            $dbuser = 'binf';
                                            $dbpass = 'dstq32sd';
                                            $dbname = 'fbo_data';
                                            /*$dbhost = 'localhost';
                                            $dbuser = 'student';
                                            $dbpass = 'student';
                                            $dbname = 'fbo_ns';*/
		mysql_connect($dbhost, $dbuser, $dbpass)
			OR die(fail('Could not connect to database.'));
		mysql_select_db($dbname);
		return mysql_query($query);
	}
	
	function fail($message) {
		die(json_encode(array('status' => 'fail', 'message' => $message)));
	}
	function success($message) {
		die(json_encode(array('status' => 'success', 'message' => $message)));
	}
?>