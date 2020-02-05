$("#email").on({
  "focus": function(event) {
    $(event.target).select();
  },
  "keyup": function(event) {
    $(event.target).val(function(index, value) {
      return value.replace(/\D/g, "")
        .replace(/([0-9])([0-9]{2})$/, '$1:$2')
    });
  }
});

$("#telefono").on({
  "focus": function(event) {
    $(event.target).select();
  },
  "keyup": function(event) {
    $(event.target).val(function(index, value) {
      return value.replace(/\D/g, "")
        .replace(/([0-9])([0-9]{2})$/, '$1:$2')
    });
  }
});


$('.item').change(function (event) {
  container = $(this).parent('.sum');

  total = 0;

  $(container).find('.item').each(function (index, el) {
    value = $(el).val() || 0
    total += parseInt(value);
  });

  $(container).find('.res').val(total);
});