export default {
    changeBtnState: function(state, payLoad) {
        var  newState = state.btnState.forEach(function(button){
            button.allActive = (payLoad == "allActive")? true: false;
            button.headActive = (payLoad == "headActive")? true: false;
            button.doubleActive = (payLoad == "doubleActive")? true: false;
            button.premiumActive = (payLoad == "premiumActive")? true: false;
        });

        return newState;
    }
}