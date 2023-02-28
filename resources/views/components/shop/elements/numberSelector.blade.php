<style>
    .leftButton {
        border-bottom-right-radius: 0;
        border-top-right-radius: 0;
    }

    .rightButton {
         border-bottom-left-radius: 0;
         border-top-left-radius: 0;
     }

    .noFocusButton:focus {
        outline: none;
        box-shadow: none;
        background-color: #212529;
    }
</style>

<div class="input-group" style="width: 120px">
    <span class="input-group-btn">
        <button id="decrementButton" class="noFocusButton leftButton btn btn-dark" type="button">-</button>
    </span>

    <input id="quantityValue" name="quantityValue" type="number" class="noFocusButton form-control text-center" maxlength="3" value="1">

    <span class="input-group-btn">
        <button id="incrementButton" class="noFocusButton rightButton btn btn-dark" type="button">+</button>
    </span>
</div>
