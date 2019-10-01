function vCampos(el,er){
    var element = $(el).val().replace(er,'');
        $(el).val(element);
}
function num(el){
    //aceita so numeros
    vCampos(el,/[^0-9]/g);
}
function num2(el){
    //aceita so numeros
    vCampos(el,/[^0-9\,]/g);
}
function MaskTelCEP(el){
    vCampos(el,/[^0-9\-1]/g);
    var element=$(el).val();

    if (event.keyCode !=8) {
        if (element.length==5) {
            $(el).val(element+'-');
        }
    }
}
function MakData(el){
    vCampos(el,/[^0-9]/g);

    var element= $(el).val();
    if (event.keyCode != 8) {
        if (element.length==2) {
            $(el).val(element+'/');
        }
        if(element.length==5){
            $(el).val(element+'/');
        }  
    }
  
}
function MaskCPF(el){
    vCampos(el,/[^0-9\.\-]/g);

    var element = $(el).val();

    if (event.keyCode !=8) {
        if (element.length==3) {
            $(el).val(element+'.')
        }
        if (element.length==7) {
            $(el).val(element+'.');
        }
        if (element.length==11) {
            $(el).val(element+'-');
        }
    }
}