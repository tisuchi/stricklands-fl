     <?php
     //If location is not empty
     if ($row_rs_list['fldLocationCode'] != "" ) {
                    // If not Toyota, uses tblvehicles if new, they don't check them in
                    if ($row_rs_list['fldLocationCode'] != "T" ) {
                    ///// Start Database Table Selections
                    if ($row_rs_list['fldLocationCode'] == "W" ) {
                         $dalloc = "a_tbl_logistics_windsor_timers";
                    }
                    if ($row_rs_list['fldLocationCode'] == "E" ) {
                         $dalloc = "a_tbl_logistics_stratford_timers";
                    }
                    if ($row_rs_list['fldLocationCode'] == "BG" ) {
                         $dalloc = "a_tbl_logistics_brantford_timers";
                    }
                    if ($row_rs_list['fldLocationCode'] == "BA" ) {
                         $dalloc = "a_tbl_logistics_brantford_auto_timers";
                    }
                    if ($row_rs_list['fldLocationCode'] == "T" ) {
                         $dalloc = "a_tbl_logistics_stratford_timers";
                    }
                    if ($row_rs_list['fldLocationCode'] == "DL" ) {
                         $dalloc = "a_tbl_logistics_demosandloaners_timers";
                    }
                    if ($row_rs_list['fldLocationCode'] == "A" ) {
                         $dalloc = "a_tbl_logistics_auction_timers";
                    }
                    if ($row_rs_list['fldLocationCode'] == "BR" ) {
                         $dalloc = "a_tbl_logistics_brantford_timers";
                    }
                    if ($row_rs_list['fldLocationCode'] == "IT" ) {
                         $dalloc = "a_tbl_logistics_stratford_timers";
                    }
                    if ($row_rs_list['fldLocationCode'] == "G" ) {
                         $dalloc = "a_tbl_logistics_stratford_timers";
                    }
                    $dalstk = $row_rs_list['fldStockNo'];
                    //echo $dalstk;
                    $query = "SELECT * FROM $dalloc WHERE fldStockNo = '" . $dalstk . "' ORDER  BY fldDate DESC ";
                    $results = mysql_query($query, $callcenter) or die(mysql_error());
                    $row = mysql_fetch_array($results);

                    $currentdate = date(Y) . "-" . date(m) . "-" . date(d);
                    $currenttime = date('H:i:s');

                    $v_datereceived = $row['fldDate'];

                    $daysinstock = round((strtotime($currentdate) - strtotime($v_datereceived)) / (60 * 60 * 24), 0, PHP_ROUND_HALF_DOWN);


                    if ( $daysinstock > "1000") {

                    }
                    else {
                    echo  $daysinstock ;
                    }
          } // End if not Toyota
          
          // Toyota Days in Stock
          if ($row_rs_list['fldLocationCode'] == "T" ) {
          $dalstk = $row_rs_list['fldStockNo'];
          //echo $dalstk;
          $query = "SELECT * FROM tblvehicles WHERE fldStockNo = '" . $dalstk . "' ";
          $results = mysql_query($query, $callcenter) or die(mysql_error());
          $row = mysql_fetch_array($results);

          $currentdate = date(Y) . "-" . date(m) . "-" . date(d);
          $currenttime = date('H:i:s');

          $v_datereceived = $row['fldDateReceived'];

          $daysinstock = round((strtotime($currentdate) - strtotime($v_datereceived)) / (60 * 60 * 24), 0, PHP_ROUND_HALF_DOWN);


          if ( $daysinstock > "1000") {

          }
          else {
          echo  $daysinstock ;
          }
          }


          
          // GM New Days in Stock
          if ($row_rs_list['fldLocationCode'] == "BG" ) { // Stratford location code is BG
          if (strpos($row_rs_list['fldStockNo'], 'G') !== false) { // Strat strpos
          $query = "SELECT * FROM tblvehicles WHERE fldStockNo = '" . $dalstk . "' ";
          $results = mysql_query($query, $callcenter) or die(mysql_error());
          $row = mysql_fetch_array($results);

          $currentdate = date(Y) . "-" . date(m) . "-" . date(d);
          $currenttime = date('H:i:s');

          $v_datereceived = $row['fldDateReceived'];

          $daysinstock = round((strtotime($currentdate) - strtotime($v_datereceived)) / (60 * 60 * 24), 0, PHP_ROUND_HALF_DOWN);


          if ( $daysinstock > "1000") {

          }
          else {
          echo  $daysinstock ;
          }
          } // End if strpos


          } // End if location code is BG
     } // End If location is not empty
     ?>