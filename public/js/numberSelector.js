$(document).ready(function() {
    $('#decrementButton').on('click', function() {
        let input = document.getElementById("quantityValue");
        let currentValue = parseInt(input.value, 10);

        if (!isNaN(currentValue) && currentValue > 1)
        {
            input.value = (currentValue - 1);
        }
        else
        {
            input.value = 1;
        }
    })

    $('#incrementButton').on('click', function() {
        let input = document.getElementById("quantityValue");
        let currentValue = parseInt(input.value, 10);

        if (!isNaN(currentValue) && currentValue < 999)
        {
            input.value = (currentValue + 1);
        }
        else if (isNaN(currentValue))
        {
            input.value = 1;
        }
        else
        {
            input.value = 999;
        }
    })

    $('#quantityValue').blur(function() {
        let currentValue = parseInt(this.value, 10);

        if (isNaN(currentValue) || currentValue > 999 || currentValue < 1)
        {
            this.value = 1;
        }
    })
});
