<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />  
    <link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/   css" media="all" />  
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>  
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js" type="text/javascript"></script>  
	
	</head>
<body>
	<div id="page-wrapper">
  <h1>Datalist Element Demo</h1>
  
  <label for="default">Pick a programming language</label>
  <input type="text" id="default" list="languages" placeholder="e.g. JavaScript">
  
  <datalist id="languages">
    <option value="1" data-name="HTML" >HTML</option>
    <option value="2" data-name="CSS" >CSS</option>
    <option value="3" data-name="JavaScript" >JavaScript</option>
    <option value="4" data-name="Java" >Java</option>
    <option value="5" data-name="Ruby" >Ruby</option>
    <option value="6" data-name="PHP" >PHP</option>
    <option value="7" data-name="Go" >Go</option>
    <option value="8" data-name="Erlang" >Erlang</option>
    <option value="9" data-name="Python" >Python</option>
    <option value="10" data-name="C" >C</option>
    <option value="11" data-name="C#" >C#</option>
    <option value="12" data-name="C++" >C++</option>
  </datalist>
  
  
  <label for="ajax">Pick an HTML Element (options loaded using AJAX)</label>
  <input type="text" id="ajax" list="json-datalist" placeholder="e.g. datalist">
  <datalist id="json-datalist"></datalist>

  
</div>
</body>
</html>