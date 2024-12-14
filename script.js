$(document).ready(function() {
    $("#submitBtn").click(function(event) {
        // Fetch values from the input fields
        const BusinessName= $("#BusinessName").val();
        const contactNumber= $("#contactNumber").val();
        const email= $("#email").val();
        const LoanAmount = $("#Loanamount").val();
        const TaxID = $("#TaxID").val();
        const EstablishedDate = $("#EstablishedDate").val();
        const LoanType = $("#LoanType").val(); // Correct selector

        // Validate if all fields are filled
        if (!BusinessName || !contactNumber || !email || !LoanAmount || !TaxID || !EstablishedDate || !LoanType) {
            alert("Please fill out all the fields!");
            event.preventDefault(); // Prevent form submission
        }
    });
});
