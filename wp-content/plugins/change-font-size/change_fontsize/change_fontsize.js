function fname(style,id)
{
	var vfontname = document.getElementById(id);
	vfontname.style.fontFamily = style;
}
function fsize(size,unit,id)
{
	var vfontsize = document.getElementById(id);
	vfontsize.style.fontSize = size + unit;
}