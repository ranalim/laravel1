// Validation errors messages for Parsley
// Load this after Parsley

Parsley.addMessages('ko', {
    defaultMessage: "입력하신 내용이 올바르지 않습니다.",
    type: {
        email:        "입력하신 이메일이 유효하지 않습니다.",
        url:          "입력하신 URL이 유효하지 않습니다.",
        number:       "입력하신 전화번호가 올바르지 않습니다.",
        integer:      "입력하신 정수가 유효하지 않습니다.",
        digits:       "숫자를 입력하여 주십시오.",
        alphanum:     "입력하신 내용은 알파벳과 숫자의 조합이어야 합니다."
    },
    notblank:       "공백은 입력하실 수 없습니다.",
    required:       "필수 입력사항입니다.",
    pattern:        "입력하신 내용이 올바르지 않습니다.",
    min:            "입력하신 내용이 %s보다 크거나 같아야 합니다. ",
    max:            "입력하신 내용이 %s보다 작거나 같아야 합니다.",
    range:          "입력하신 내용이 %s보다 크고 %s 보다 작아야 합니다.",
    minlength:      "%s 이상의 글자수를 입력하십시오. ",
    maxlength:      "%s 이하의 글자수를 입력하십시오. ",
    length:         "입력하신 내용의 글자수가 %s보다 크고 %s보다 작아야 합니다.",
    mincheck:       "최소한 %s개를 선택하여 주십시오. ",
    maxcheck:       "%s개 또는 그보다 적게 선택하여 주십시오.",
    check:          "선택하신 내용이 %s보다 크거나 %s보다 작아야 합니다.",
    equalto:        "같은 값을 입력하여 주십시오."
});

Parsley.setLocale('ko');


/*! Select2 4.0.3 | https://github.com/select2/select2/blob/master/LICENSE.md */

(function(){if(jQuery&&jQuery.fn&&jQuery.fn.select2&&jQuery.fn.select2.amd)var e=jQuery.fn.select2.amd;return e.define("select2/i18n/ko",[],function(){return{errorLoading:function(){return"결과를 불러올 수 없습니다."},inputTooLong:function(e){var t=e.input.length-e.maximum,n="너무 깁니다. "+t+" 글자 지워주세요.";return n},inputTooShort:function(e){var t=e.minimum-e.input.length,n="너무 짧습니다. "+t+" 글자 더 입력해주세요.";return n},loadingMore:function(){return"불러오는 중…"},maximumSelected:function(e){var t="최대 "+e.maximum+"개까지만 선택 가능합니다.";return t},noResults:function(){return"결과가 없습니다."},searching:function(){return"검색 중…"}}}),{define:e.define,require:e.require}})();