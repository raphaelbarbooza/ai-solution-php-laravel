import Swal from "sweetalert2";

export function alertSuccess(message, title = "Sucesso!"){
    Swal.fire({
        title: title,
        html: message,
        icon: 'success',
        confirmButtonText: 'Ok'
    });
}

export function alertError(message, title = "Erro!"){
    Swal.fire({
        title: title,
        html: message,
        icon: 'error',
        confirmButtonText: 'Ok'
    });
}
