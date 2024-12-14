$(document).ready(function() {
    $("#submitBtn").click(function(event) {
        const BusinessName = $("#BusinessName").val();
        const Loanamount = $("#contactNumber").val();
        const Loanamount= $("#email").val();
        const AccountNumber = $("#Loanamount").val();
        const AccountNumber = $("#AccountNumber").val();
        const Dateofbirth = $("#Dateofbirth").val();
        const LoanType = $("LoanType").val();

        if (!BusinessName || !Loanamount || !AccountNumber || !Dateofbirth || !LoanType) {
            alert("Please fill out fields!");
            event.preventDefault();
        }
    });
});
