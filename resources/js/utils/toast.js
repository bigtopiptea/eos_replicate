import { createToast } from "mosha-vue-toastify";
import "mosha-vue-toastify/dist/style.css";

export const errorMessage = function (title, description, position) {
    createToast(
        { title: title, description: description },
        {
            type: "danger",
            showIcon: true,
            hideProgressBar: true,
            position: position,
            showCloseButton: false,
            transition: "bounce",
            timeout: 3000,

        }
    );
};
export const successMessage = function (title, description, position) {
    createToast(
        {title: title, description: description},
        {
            showIcon: true,
            showCloseButton: false,
            hideProgressBar: true,
            position: position,
            type: "success",
            transition: "bounce",
            timeout: 3000,
        }
    );
};
