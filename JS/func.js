function  validateFloat(ValueNumeric)
{
	var objRegex = /(^-?\d\d*\.\d\d*$)|(^-?\.\d\d*$)/;
	var objRegex2 = /(^\d\d*$)/;
	//check for numeric characters

	if(objRegex2.test(ValueNumeric.value)) {
		ValueNumeric.value = ValueNumeric.value + ".0";
	}

	if(!objRegex.test(ValueNumeric.value) && !objRegex2.test(ValueNumeric.value) )
	{
		alert("Your input \""+ValueNumeric.value+"\" must be a flaoting number (e.g.: 1.4 , 1.0, 0.7 )");
	}
}
function  validateInteger(ValueNumeric)
{
	var objRegex = /(^\d\d*$)/;
	if(!objRegex.test(ValueNumeric.value))
	{
		alert("Your input \""+ValueNumeric.value+"\" must be an integer.");
	}
}

function  validateIntegerRange(ValueNumeric,min,max)
{
	var objRegex = /(^\d\d*$)/;
	if(!objRegex.test(ValueNumeric.value))
	{
		alert("Your input \""+ValueNumeric.value+"\" must be an integer.");
	}

	if(ValueNumeric.value <= min || ValueNumeric.value >= max ) {
		alert("Your input \""+ValueNumeric.value+"\" must be an integer between ["+min+","+max+"].");
	}
}

function  validateList(ValueNumeric)
{
	var objRegex = /(^all$)|(^\d\d*(,\s?\d\d*)*$)/;
	if(!objRegex.test(ValueNumeric.value))
	{
		alert("Your input \""+ValueNumeric.value+"\" must be either 'all' or a list (e.g. '0,2,3', '1, 4, 5' ).");
	}
}

function show(obj) {
	no = obj.options[obj.selectedIndex].value;
	count = obj.options.length;
	for(i=0;i<count;i++) {	
		document.getElementById('AdvOptions'+i).className = "hiddenDiv";
		document.getElementById('Comment'+i).className = "hiddenDiv";
	}
	if(no>=0) {
		document.getElementById('AdvOptions'+no).className = "visibleDiv";
		document.getElementById('Comment'+no).className = "visibleDiv";
	}
}

var lastDiv = "";
function showDiv(divName) {
	// hide last div
	if (lastDiv) {
		document.getElementById(lastDiv).className = "hiddenDiv";
	}
	//if value of the box is not nothing and an object with that name exists, then change the class
	if (divName && document.getElementById(divName)) {
		document.getElementById(divName).className = "visibleDiv";
		lastDiv = divName;
	}
}