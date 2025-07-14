
function object(obj_file,width,height,wmode)
{
    var obj_src = "";
    obj_src += "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0\" width=\""+width+"\" height=\""+height+"\">\n";
    obj_src += "  <param name=\"movie\" value=\""+obj_file+"\">\n";
    if(wmode!="")
    {
        obj_src += "  <param name=\"wmode\" value=\""+wmode+"\">\n";
    }
    obj_src += "  <param name=allowScriptAccess value=sameDomain>\n";
 obj_src += "  <param name=\"menu\" value=\"false\">\n";
    obj_src += "  <param name=\"quality\" value=\"high\">\n";
    obj_src += "  <embed src=\""+obj_file+"\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" width=\""+width+"\" height=\""+height+"\"></embed>\n";
    obj_src += "</object>\n";
   
    document.write(obj_src);
}