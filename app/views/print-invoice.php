<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="ui\ui\images\Logo-Biling-Warna.png">
    <link id="pagestyle" href="<?= BASEURL; ?>/css/soft-ui-dashboard.css" rel="stylesheet" />
    <style>
	.ukuran {
        width: 80mm;
        height: 297mm;
    }

	body,td,th {
		font-size: 12px;
		font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;
	}
	page[size="A4"] {
	  background: white;
	  width: 21cm;
	  height: 29.7cm;
	  display: block;
	  margin: 0 auto;
	  margin-bottom: 0.5cm;
	  html, body {
		width: 210mm;
		height: 297mm;
	  }
	}
	page[size="thermal"] {
	  background: white;
	  width: 8cm;
	  height: 7.9cm;
	  display: block;
	  margin: 0 auto;
	  margin-bottom: 0.5cm;
	  html, body {
		width: 210mm;
		height: 297mm;
	  }
	}
	@media print {
        body {
            size: auto;
            margin: 0;
            box-shadow: 0;
        }
        page[size="A4"] {
            margin: 0;
            size: auto;
            box-shadow: 0;
        }
        page[size="thermal"] {
            margin: 0;
            size: auto;
            box-shadow: 0;
        }
        .page-break	{ display: block; page-break-before: always; }
        .no-print, .no-print *
        {
            display: none !important;
        }
    }
    </style>
</head>

<body>
<page size="thermal">
    <form method="post" action="" class="no-print">
        <div class="row">
            <div class="col-lg-4">
                
            </div>
        </div>
        <table width="100%" border="0" cellspacing="0" cellpadding="1">
            <tr>
                <td>ID &gt; <input type="text" name="from_id" style="width:40px" value=""> limit <input type="text" name="limit" style="width:40px" value="{$limit}"></td>
                <td>PageBreak after  <input type="text" style="width:40px" name="pagebreak" value=""> vouchers</td>
                <td>Plans <select id="plan_id" name="planid" style="width:150px">
                <option value="0">--all--</option>
                </select></td>
                <td><button class="btn btn-primary" type="submit">submit</button></td>
            </tr>
        </table><hr>
        <center><button type="button" id="actprint" class="btn btn-primary btn-sm no-print">Print</button><br>
        <br>
        </center>
    </form>
        <div id="printable">
            <hr>
            <table width="100%" height="200" border="0" cellspacing="0" cellpadding="1" style="margin-bottom:5px">
                <tbody>
                    <tr><td align="center" valign="middle"></td></tr>
                    <tr>
                    <td align="center" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="2">
                        <tr>
                            <td width="100%" valign="middle" style="text-align: center">
                            <center><strong style="font-size:38px">MeatGankz</strong><span class="no-print"></span></center>
                            </td>
                        </tr>
                        <tr>
                            <td width="100%" valign="middle" style="text-align: center">
                            <h4>Jl. jalan</h4>
                            </td>
                        </tr>
                        <tr>
                            <td width="100%" valign="middle" style="text-align: center">
                                <h4>081233</h4>
                            </td>
                        </tr>
                        </table>
                    </td>
                    </tr>
                </tbody>
                </table>
                <hr>
        </div>
</page>
<script src="ui/ui/scripts/jquery-1.10.2.js"></script>

<script>
    jQuery(document).ready(function() {
        // initiate layout and plugins
        $("#actprint").click(function() {
            window.print();
            return false;
        });
    });
</script>

</body>
</html>