

<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Admin</title>


     <style type="text/css">
     html {
	-moz-overflow-y: scroll;
}

body {
	border: 0;
	padding: 0;
}

body, td, p {
	font-family: Arial,Verdana,Tahoma;
	font-size: 10pt;
}

h2 {
	margin: 8px 0 14px 0
	text-align: center;
}

.login-container {
	margin-top: 32px;
}

.login-box {
	width: 300px;
	background-color: #f0f0f0;
	border: 1px solid #ccc;
	padding: 0 16px;
    -moz-border-radius: 8px;
    -webkit-border-radius: 8px;
    border-radius: 8px;
    -moz-box-shadow: 0px 0px 20px #666;
    -webkit-box-shadow: 0px 0px 20px #666;
    box-shadow: 0px 0px 20px #666;
    behavior: url('ie-css3.htc');
    height:235px;
    padding-top:73px;
}
.login-box-inner {
	width: 162px;
	text-align: left;   
    margin-top: 24px;
}

.errors {
	display: block;
	overflow: hidden;
	width: 100%;
	padding: 2px;
	text-align: center;
	background-color: #ff0000;
	color: #ffffff;
	font-weight: bold;
}

.current-user {
	float: right;
	padding: 2px;
	color: #364778;
}

.current-user label {
	color: #7588BF;
}

.page-container {
	display: block;
    overflow: hidden;
    width: 98%;
	minHeight: 400px;
	padding: 12px;
}

.detail-container {
	background-color: #ffffff;
	padding: 4px;
}

#datalist {
	border-collapse: collapse;
	empty-cells: show;
	width: 100%;
	padding: 2px;
	margin: 0;
}

#datalist td, #datalist th {
	font-family: Arial,Verdana,Tahoma;
	font-size: 10pt;
	padding: 2px;
	border: 1px solid #ccc;
}

#datalist th {
	background-color: #eee;
	font-weight: bold;
	color: #888;
}

#datalist tbody tr:even {
	background-color: #f4f4f4;
}

#datalist tbody tr:odd {
	background-color: #ffffff;
}

.caption {
	width: 35%;
	text-align: right;
	padding: 2px;
	color: #888;
}

.content-container {
    padding: 8px;
}

#field-container {
    width: 540px;
    text-align: left;
}

#field-header-container {
    width: 522px;
}

#table-fields-container {
    display: block;
    overflow-x: hidden;
    overflow-y: scroll;
    height: 280px;
    width: 540px;
}

#table-headers {
    table-layout: fixed;
    border-collapse: collapse;
}

#table-fields {
    table-layout: fixed;
    border-collapse: collapse;
    empty-cells: show;
}

#table-headers th {
    background-color: #276085;
    color: #FFFFFF;
    border: 1px solid #D4D5F0;
    font-size: 10pt;
}

#table-fields td {
    border: 1px solid #D4D5F0;
}

.top {
    display: block;
    overflow: hidden;
    width: 97.2%;
    height: 58px;
    background-color: #ff0000;
}



.company-name {
    float: left;
    font-size: 32pt;
    font-weight: bold;
    font-style: italic;
    margin-left: 24px;
}

.table-actions {
    float: right;
    display: block;
    overflow: hidden;
    width: 100%;
}

.clear { /* generic container (i.e. div) for floating buttons */
    overflow: hidden;
    width: 100%;
}

a.button {
    background: transparent url('bg_button_a.gif') no-repeat scroll top right;
    color: #444;
    display: block;
    float: left;
    font: normal 12px arial, sans-serif;
    height: 24px;
    margin-right: 6px;
    padding-right: 18px; /* sliding doors padding */
    text-decoration: none;
}

a.button span {
    background: transparent url('bg_button_span.gif') no-repeat;
    display: block;
    line-height: 14px;
    padding: 5px 0 5px 18px;
}

input[type="button"], input[type="submit"] {
    background-color: #266591;
    border: 2px solid #222594;
    color: #fff;
    padding: 1px 6px 1px 6px;
    margin: 0 2px 2px 0;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
}

input[type="button"]:hover, input[type="submit"]:hover {
    background-color: #DCDDF6;
    color: #000;
}

     </style>

</head>
<body>



<div class="page-container">
<div class="detail-container">
<form id="frmLogin" name="frmLogin" method="post" action="login.php">

<div align="center" class="login-container">
<div align="center" class="login-box">
<h2>Administrator Login</h2>
<div class="login-box-inner">
<p style="color: #CC0000;font-weight: bold"></p>
<p>User Name:<br>
<input type="text" id="user_id" name="user" value="" size="20" maxlength="20">
</p>
<p>Password:<br>
<input type="password" id="pwd" name="pass" size="20&quot;">
</p>
</div>
<p>
<input type="submit" id="cmd" name="cmd" value="Login">
</p>
</div>
</div>
</form>
<div></div>
</div></div>

</body></html>