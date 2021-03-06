<?php
/*******************************************************************************

    Copyright 2011, Missoula Community Co-op

    This file is part of IS4C.

    IS4C is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    IS4C is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    in the file license.txt along with IS4C; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*********************************************************************************/

if (!function_exists("pDataConnect")) include("connect.php");
if (!function_exists("printheaderb")) include("drawscreen.php");
if (!function_exists("gohome")) include("maindisplay.php");



if (isset($_POST["refundamount"])) {
    $refundamount = strtoupper(trim($_POST["refundamount"]));
}
else {
    $refundamount = "";
}


error_log("refundamount: $refundamount");
if (!$refundamount || strlen($refundamount) < 1) {
	$_SESSION['refund'] = 0;
	$_SESSION["msgrepeat"] = 0;
    gohome();
} else {
	$_SESSION['refund'] = 1;
	$refundreason = $_POST['reason'];
	$dept = $_POST['dptmt'];

	// assume no decimal was entered, so divide by 100
	$refundamount = $refundamount / 100;

	addItem("", "Refund: " . $refundreason, "I", "RF", "R",
		$dept, $refundamount, 1, $refundamount, $refundamount, 0, 0,
		0, 0, 0, 0, 0, 0,
		1, "", "", "", "", "",
		"", "", "");
	gohome();

}
$_SESSION["scan"] = "noScan";
$_SESSION["beep"] = "noBeep";
printfooter();

?>

