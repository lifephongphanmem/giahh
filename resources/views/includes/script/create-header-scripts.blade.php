<!-- put the custom script for this page here -->
<script type="text/javascript" src="{{ url('vendors/jquery-validate/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="{{ url('vendors/jquery-steps/js/jquery.steps.min.js') }}"></script>
<script type="text/javascript" src="{{ url('vendors/jquery-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/form-wizard.js') }}"></script>

<script>
    $(function(){
        // Input Mask
        if($.isFunction($.fn.inputmask))
        {
            $("[data-mask]").each(function(i, el)
            {
                var $this = $(el),
                        mask = $this.data('mask').toString(),
                        opts = {
                            numericInput: attrDefault($this, 'numeric', false),
                            radixPoint: attrDefault($this, 'radixPoint', ''),
                            rightAlignNumerics: attrDefault($this, 'numericAlign', 'left') == 'right'
                        },
                        placeholder = attrDefault($this, 'placeholder', ''),
                        is_regex = attrDefault($this, 'isRegex', '');


                if(placeholder.length)
                {
                    opts[placeholder] = placeholder;
                }

                switch(mask.toLowerCase())
                {
                    case "phone":
                        mask = "(999) 999-9999";
                        break;

                    case "currency":
                    case "rcurrency":

                        var sign = attrDefault($this, 'sign', '$');;

                        mask = "999,999,999.99";

                        if($this.data('mask').toLowerCase() == 'rcurrency')
                        {
                            mask += ' ' + sign;
                        }
                        else
                        {
                            mask = sign + ' ' + mask;
                        }

                        opts.numericInput = true;
                        opts.rightAlignNumerics = false;
                        opts.radixPoint = '.';
                        break;

                    case "email":
                        mask = 'Regex';
                        opts.regex = "[a-zA-Z0-9._%-]+@[a-zA-Z0-9-]+\\.[a-zA-Z]{2,4}";
                        break;

                    case "fdecimal":
                        mask = 'decimal';
                        $.extend(opts, {
                            autoGroup		: true,
                            groupSize		: 3,
                            radixPoint		: attrDefault($this, 'rad', '.'),
                            groupSeparator	: attrDefault($this, 'dec', ',')
                        });
                }

                if(is_regex)
                {
                    opts.regex = mask;
                    mask = 'Regex';
                }

                $this.inputmask(mask, opts);
            });
        }
    });

    // Element Attribute Helper
    function attrDefault($el, data_var, default_val)
    {
        if(typeof $el.data(data_var) != 'undefined')
        {
            return $el.data(data_var);
        }

        return default_val;
    }
</script>