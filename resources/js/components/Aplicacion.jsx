import React from "react";
import ReactDOM from 'react-dom/client';
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Menu from "./Menu/Menu";
import Index from "./Pages/Index";
import Error404 from "./Pages/Error404";
import Direcciones from "./Pages/Direcciones/Direcciones";
import { ToastContainer } from "react-toastify";
import Carreras from "./Pages/Carreras/Carreras";
import Asignaturas from "./Pages/Asignaturas/Asignaturas";
import Laboratorios from "./Pages/Laboratorios/Laboratorios";
import Cuatrimestres from "./Pages/Cuatrimestres/Cuatrimestres";
import Unidades_medida from "./Pages/Unidades de Medida/Unidades_medida";
import Materiales from "./Pages/Materiales/Materiales";
import Dias_Feriados from "./Pages/Dia_Feriado/Dia_Feriado";
import Grupos_Laboratorios from "./Pages/Grupos_Laboratorios/Grupos_laboratorios";
import Formatos_Laboratorios from "./Pages/Formatos_Laboratorios/Formatos_Laboratorios";
import Detalles_formatos_laboratorios from "./Pages/Detalle_Formatos_Laboratorios/Detalle_Formatos_Laboratorios";

function Aplicacion() {
  return (
    <Router>
      <Menu />

      <ToastContainer />

      <div className="container">
        <Routes>
          <Route path="/" element={<Index />} />
          <Route path="/direcciones" element={<Direcciones />} />
          <Route path="/carreras" element={<Carreras />} />
          <Route path="/asignaturas" element={<Asignaturas />} />
          <Route path="/laboratorios" element={<Laboratorios />} />
          <Route path="/cuatrimestres" element={<Cuatrimestres />} />
          <Route path="/cuatrimestres" element={<Cuatrimestres />} />
          <Route path="/unidades_medidas" element={<Unidades_medida />} />
          <Route path="/materiales" element={<Materiales />} />
          <Route path="/dias_feriados" element={<Dias_Feriados />} />
          <Route path="/grupos_laboratorios" element={<Grupos_Laboratorios />} />
          <Route path="/formatos_laboratorios" element={<Formatos_Laboratorios />} />
          <Route path="/detalle_formato_laboratorio" element={<Detalles_formatos_laboratorios />} />

          <Route path="*" element={<Error404/>} />          
        </Routes>
      </div>
    </Router>
  );
}

export default Aplicacion;

if (document.getElementById('root')) {
  const root = ReactDOM.createRoot(document.getElementById("root"));

  root.render(
    <React.StrictMode>
      <Aplicacion />
    </React.StrictMode>
  );
}