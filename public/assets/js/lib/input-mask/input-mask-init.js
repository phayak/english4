$(document).ready(function() {
    $('#date-mask-input').mask("00/00/0000", {placeholder: "__/__/____"});
    $('#time-mask-input').mask('00:00:00', {placeholder: "__:__:__"});
    $('#date-and-time-mask-input').mask('00/00/0000 00:00:00', {placeholder: "__/__/____ __:__:__"});
    $('#zip-code-mask-input').mask('00000-000', {placeholder: "_____-___"});
    $('#money-mask-input').mask('0,000', {reverse: true});
    $('#phone-mask-input').mask('000-0000000', {placeholder: "___-_______"});
    $('#phone-with-code-area-mask-input').mask('(00) 0000-0000', {placeholder: "(__) ____-____"});
    $('#us-phone-mask-input').mask('(000) 000-0000', {placeholder: "(___) ___-____"});
    $('#ip-address-mask-input').mask('099.099.099.099');
    $('#mixed-mask-input').mask('AAA 000-S0S');
});
