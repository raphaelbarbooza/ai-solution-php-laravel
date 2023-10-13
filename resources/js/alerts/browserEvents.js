import {alertSuccess, alertError} from "./alerts";
import Swal from "sweetalert2";

// Success Sweet Alert
window.addEventListener('alert-success', event => {
    if(event.detail.title)
        alertSuccess(event.detail.message, event.detail.title);
    else
        alertSuccess(event.detail.message);
});

// Error Sweet Alert
window.addEventListener('alert-error', event => {
    if(event.detail.title)
        alertError(event.detail.message, event.detail.title);
    else
        alertError(event.detail.message);
});

// Confirm Import
window.addEventListener('confirm-import', event => {
    // Ask user for confirmation
    Swal.fire({
        icon: "warning",
        html: "O processo acontece em segundo plano, e pode demorar alguns minutos para ser finalizado.<br/><br>Se o worker estiver em execução, o processo iniciara em alguns instantes.</b>",
        confirmButtonText: "Continuar",
        showCancelButton: true,
        cancelButtonText: "Cancelar"
    }).then(res => {
        if(res.isConfirmed){
            Livewire.dispatch('dispatch-import-job');
        }
    });
});

// Confirm Process
window.addEventListener('confirm-process', event => {
    // Ask user for confirmation
    Swal.fire({
        icon: "warning",
        html: "O processo acontece em segundo plano, e pode demorar alguns minutos.<br/><br>Se o worker estiver em execução, o processo iniciara em alguns instantes.</b>",
        confirmButtonText: "Continuar",
        showCancelButton: true,
        cancelButtonText: "Cancelar"
    }).then(res => {
        if(res.isConfirmed){
            Livewire.dispatch('dispatch-process-job');
        }
    });
});
