import React from "react";
import { ToastContainer, toast } from "react-toastify";
import 'react-toastify/dist/ReactToastify.css';

export default function Notificaciones() {
  const notify = () => toast("Wow, ¡es muy fácil!");

  return (
    <div>
      <button className="btn btn-primary" onClick={notify}>Mostrar Notificación</button>
      <ToastContainer />
    </div>
  );
}

