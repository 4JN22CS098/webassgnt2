$(document).ready(function() {
    $("#submitBtn").click(function(event) {
        // Fetch values from the input fields
        const businessName = $("#BusinessName").val();
        const loanAmount = $("#Loanamount").val();
        const accountNumber = $("#AccountNumber").val();
        const dateOfBirth = $("#Dateofbirth").val();
        const loanType = $("#LoanType").val(); // Correct selector

        // Validate if all fields are filled
        if (!businessName || !loanAmount || !accountNumber || !dateOfBirth || !loanType) {
            alert("Please fill out all the fields!");
            event.preventDefault(); // Prevent form submission
        }
    });
});
