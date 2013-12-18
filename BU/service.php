<?php
$oplMW = array('OP'=>'Orthopedagogie','SW'=>'Sociaal werk', 'KO'=>'Kleuteronderwijs','LO'=>'Lager onderwijs','SO'=>'Secundair onderwijs',
        'BML'=>'Biomedische laboratoriumtechnologie', 'ET'=>'Ergotherapie','LA'=>'Logopedie en audiologie', 'VPL'=>'Verpleegkunde','VD'=>'Voedings- en dieetkunde');
$kMW = array(
        'AO'=>'Algemene orthopedagogie','OB'=>'Opvoedingsbegeleiding en -coaching bij kinderen',
        'MW'=>'Maatschappelijk werk','PW'=>'Personeelswerk','SC'=>'Sociaal-cultureel werk','MAD'=>'Maatschappelijke advisering',       
        'ML'=>'Medische laboratoriumtechnologie','FBL'=>'Farmaceutische en biologische laboratoriumtechnologie',
        'LOG'=>'Logopedie','AUD'=>'Audiologie',       
    );
$oplBO = array('BM'=>'Bedrijfsmanagement','OM'=>'Office management','TIN'=>'Toegepaste informatica','RM'=>'Retailmanagement');
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
        'FOT'=>'Fotografie','MMV'=>'Multimediale vormgeving','TEO'=>'Textielontwerp','MOD'=>'Mode',
        'GRO'=>'Grafisch ontwerp','GRA'=>'Grafiek','GRV'=>'Grafische vormgeving','WID'=>'Web- en interactief design','ILL'=>'Illustratie'
    );
if($_POST){	
	if ($_POST['action'] == 'addStudentBO') {	
                                            $opl = $keuze = '';
                                            $fname = htmlspecialchars($_POST['txtFirstName']);
		$lname = htmlspecialchars($_POST['txtLastName']);
                                            $email = htmlspecialchars($_POST['txtEmail']);
                                            $straat = htmlspecialchars($_POST['txtStraat']);
                                            $pc = htmlspecialchars($_POST['txtPC']);
                                            $gemeente = htmlspecialchars($_POST['txtGemeente']);
                                            $fac = 'Bedrijf en Organisatie';
                                            foreach ($oplBO as $io=>$o){
                                                if ($_POST[$io]==='on') $opl .='  '.$o;
                                            };
                                            foreach ($kBO as $ik=>$k){
                                                if (isset($_POST[$ik]) && $_POST[$ik]==='on') $keuze .='  '.$k;
                                            };
                                            		
		if(preg_match('/[^\w\s]/i', $fname) || preg_match('/[^\w\s]/i', $lname)) {
			fail('Foute naam.');
		}
		if( empty($fname) || empty($lname) || empty($email)) {
			fail('Voornaam, naam en e-mail zijn verplicht.');
		}
		if( empty($email) ) {
			fail('E-mail is verplicht.');
		}
                                            if (!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$email)) {
                                                                fail( "Geen correct e-mail.");
                                            }
		$query = "INSERT INTO seckeuze SET voornaam='$fname', naam='$lname',email='$email',straat='$straat', pc='$pc',gemeente='$gemeente',fac='$fac',opl='$opl',keuze='$keuze',regdate =NOW()";
		$result = db_connection($query);
		
		if ($result) {
			$msg = $fname." ".$lname." is succesvol toegevoegd." ;
			success($msg);
		} else {
			fail('Toevoegen mislukt: '+$result);
		}
		exit;
	}
                       if ($_POST['action'] == 'addStudentMW') {                                            
                                            $opl = $keuze = '';
                                            $fname = htmlspecialchars($_POST['txtFirstName']);
		$lname = htmlspecialchars($_POST['txtLastName']);
                                            $email = htmlspecialchars($_POST['txtEmail']);
                                            $straat = htmlspecialchars($_POST['txtStraat']);
                                            $pc = htmlspecialchars($_POST['txtPC']);
                                            $gemeente = htmlspecialchars($_POST['txtGemeente']);
                                            $fac = 'Mens en Welzijn';
                                            foreach ($oplMW as $io=>$o){
                                                if ($_POST[$io]==='on') $opl .='  '.$o;
                                            };
                                            foreach ($kMW as $ik=>$k){
                                                if (isset($_POST[$ik]) && $_POST[$ik]==='on') $keuze .='  '.$k;
                                            };	
		if(preg_match('/[^\w\s]/i', $fname) || preg_match('/[^\w\s]/i', $lname)) {
			fail('Foute naam.');
		}
		if( empty($fname) || empty($lname) || empty($email)) {
			fail('Voornaam, naam en e-mail zijn verplicht.');
		}
		if( empty($email) ) {
			fail('E-mail is verplicht.');
		}
                                            if (!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$email)) {
                                                                fail( "Geen correct e-mail.");
                                            }
		$query = "INSERT INTO seckeuze SET voornaam='$fname', naam='$lname',email='$email',straat='$straat', pc='$pc',gemeente='$gemeente',fac='$fac',opl='$opl',keuze='$keuze',regdate =NOW()";
		$result = db_connection($query);
		
		if ($result) {
			$msg = $fname." ".$lname." is succesvol toegevoegd." ;
			success($msg);
		} else {
			fail('Toevoegen mislukt: '+$result);
		}
		exit;
	}
                         if ($_POST['action'] == 'addStudentNT') {                                            
                                            $opl = $keuze = '';
                                            $fname = htmlspecialchars($_POST['txtFirstName']);
		$lname = htmlspecialchars($_POST['txtLastName']);
                                            $email = htmlspecialchars($_POST['txtEmail']);
                                            $straat = htmlspecialchars($_POST['txtStraat']);
                                            $pc = htmlspecialchars($_POST['txtPC']);
                                            $gemeente = htmlspecialchars($_POST['txtGemeente']);
                                            $fac = 'Natuur en Techniek';
                                            foreach ($oplNT as $io=>$o){
                                                if ($_POST[$io]==='on') $opl .='  '.$o;
                                            };
                                            foreach ($kNT as $ik=>$k){
                                                if (isset($_POST[$ik]) && $_POST[$ik]==='on') $keuze .='  '.$k;
                                            };	
		if(preg_match('/[^\w\s]/i', $fname) || preg_match('/[^\w\s]/i', $lname)) {
			fail('Foute naam.');
		}
		if( empty($fname) || empty($lname) || empty($email)) {
			fail('Voornaam, naam en e-mail zijn verplicht.');
		}
		if( empty($email) ) {
			fail('E-mail is verplicht.');
		}
                                            if (!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$email)) {
                                                                fail( "Geen correct e-mail.");
                                            }
		$query = "INSERT INTO seckeuze SET voornaam='$fname', naam='$lname',email='$email',straat='$straat', pc='$pc',gemeente='$gemeente',fac='$fac',opl='$opl',keuze='$keuze',regdate =NOW()";
		$result = db_connection($query);
		
		if ($result) {
			$msg = $fname." ".$lname." is succesvol toegevoegd." ;
			success($msg);
		} else {
			fail('Toevoegen mislukt: '+$result);
		}
		exit;
	}
                        if ($_POST['action'] == 'addStudentART') {                                            
                                            $opl = $keuze = '';
                                            $fname = htmlspecialchars($_POST['txtFirstName']);
		$lname = htmlspecialchars($_POST['txtLastName']);
                                            $email = htmlspecialchars($_POST['txtEmail']);
                                            $straat = htmlspecialchars($_POST['txtStraat']);
                                            $pc = htmlspecialchars($_POST['txtPC']);
                                            $gemeente = htmlspecialchars($_POST['txtGemeente']);
                                            $fac = 'School of Arts';
                                            foreach ($oplART as $io=>$o){
                                                if ($_POST[$io]==='on') $opl .='  '.$o;
                                            };
                                            foreach ($kART as $ik=>$k){
                                                if (isset($_POST[$ik]) && $_POST[$ik]==='on') $keuze .='  '.$k;
                                            };	
		if(preg_match('/[^\w\s]/i', $fname) || preg_match('/[^\w\s]/i', $lname)) {
			fail('Foute naam.');
		}
		if( empty($fname) || empty($lname) || empty($email)) {
			fail('Voornaam, naam en e-mail zijn verplicht.');
		}
		if( empty($email) ) {
			fail('E-mail is verplicht.');
		}
                                            if (!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',$email)) {
                                                                fail( "Geen correct e-mail.");
                                            }
		$query = "INSERT INTO seckeuze SET voornaam='$fname', naam='$lname',email='$email',straat='$straat', pc='$pc',gemeente='$gemeente',fac='$fac',opl='$opl',keuze='$keuze',regdate =NOW()";
		$result = db_connection($query);
		
		if ($result) {
			$msg = $fname." ".$lname." is succesvol toegevoegd." ;
			success($msg);
		} else {
			fail('Toevoegen mislukt: '+$result);
		}
		exit;
	}
}

if($_GET){
	if($_GET['action'] == 'getStudents'){
		$query = "SELECT fac, opl, keuze, voornaam, naam, email, regdate  FROM seckeuze order by fac, opl, keuze, naam ASC";
		$result = db_connection($query);
		
		$studs = array();

		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			array_push($studs, array('fac' => $row['fac'],'opl' => $row['opl'],'keuze' => $row['keuze'],'voornaam' => $row['voornaam'], 'naam' => $row['naam'], 'email' => $row['email'], 'datum' => $row['regdate']));
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
                                           /* $dbhost = 'localhost';
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