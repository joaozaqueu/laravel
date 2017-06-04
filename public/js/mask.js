var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
          field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };
$('#sp_celphones').mask(SPMaskBehavior, spOptions);

var DocumentoMask = function (val){
  return val.replace(/\D/g, '').length === 11 ? '000.000.000-00' : '000.000.000-00';
}
$('#documento').mask(DocumentoMask, {reverse: true});

$('#preco').mask("#.##0.00", {reverse: true});
    