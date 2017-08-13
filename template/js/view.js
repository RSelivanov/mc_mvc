$(function(){
    $("#uploadSkinButton").click(function() {
        $("#uploadSkinInput input[type='file']").click();
            return false;
        });
    $("#uploadSkinInput input[type='file']").change(function() {
        //ShowLoading();
        $("#uploadSkinSubmit").click();
    });
    
    $("#uploadCloakButton").click(function() {
        $("#uploadCloakInput input[type='file']").click();
            return false;
        });
    $("#uploadCloakInput input[type='file']").change(function() {
        //ShowLoading();
        $("#uploadCloakSubmit").click();
    })
});