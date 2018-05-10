function typefunction()
    {
    var itemTypes = jQuery('#type');
    var select = this.value;
    itemTypes.change(function () {
        if ($(this).val() == '1-Hand') {
            $('.1-Hand').show();
            $('.2-Hand').hide();
            $('.off').hide();
            $('.Armor').hide();
        }
        else $('.1-Hand').hide();
        if ($(this).val() == '2-Hand') {
            $('.2-Hand').show();
            $('.1-Hand').hide();
            $('.off').hide();
            $('.Armor').hide();
        }
        else $('.2-Hand').hide();
        if ($(this).val() == 'Armor') {
            $('.Armor').show();
            $('.2-Hand').hide();
            $('.off').hide();
            $('.1-Hand').hide();
        }
        else $('.Armor').hide();
        if ($(this).val() == 'Off-Hand') {
            $('.Off').show();
            $('.2-Hand').hide();
            $('.1-Hand').hide();
            $('.Armor').hide();
        }
         else $('.Off').hide();
        if ($(this).val() == '1-Hand') {
            $('.one-hand-dps').show();
            $('.item-armor').hide();
            $('.two-hand-dps').hide();
        }
         else $('.one-hand-dps').hide();
         if ($(this).val() == '2-Hand') {
            $('.two-hand-dps').show();
            $('.one-hand-dps').hide();
            $('.item-armor').hide();
        }
         else $('.two-hand-dps').hide();
        if ($(this).val() == 'Armor') {
            $('.item-armor').show();
            $('.one-hand-dps').hide();
            $('.two-hand-dps').hide();
        }
         else $('.item-armor').hide();
    });
}
