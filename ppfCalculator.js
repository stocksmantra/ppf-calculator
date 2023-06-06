document.getElementById("ppfForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const initialDeposit = parseFloat(document.getElementById("initialDeposit").value);
    const depositInterval = document.getElementById("depositInterval").value;
    const depositAmount = parseFloat(document.getElementById("depositAmount").value);
    const interestRate = parseFloat(document.getElementById("interestRate").value) / 100;

    const periodsPerYear = {
        monthly: 12,
        quarterly: 4,
        yearly: 1
    };

    const periods = 15 * periodsPerYear[depositInterval];
    const monthlyInterestRate = Math.pow(1 + interestRate, 1 / periodsPerYear[depositInterval]) - 1;

    const maturityAmount = initialDeposit * Math.pow(1 + monthlyInterestRate, periods) +
        depositAmount * (((Math.pow(1 + monthlyInterestRate, periods) - 1)) / monthlyInterestRate);

    document.getElementById("maturityAmount").textContent = maturityAmount.toFixed(2);
});