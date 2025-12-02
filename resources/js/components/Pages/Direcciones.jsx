import React, { useEffect, useState } from "react";
import { Card, Table } from "react-bootstrap";

// URL y token
const url = 'http://localhost:8000/api/direcciones';
const token = '2|p1OQ9pwBeWWUiMILIM6XEHcMDZoFychzR7NmQqHCb215bc5b';

export default function Direcciones(props) {
  // Estado para manejar los datos, carga y errores
  const [res, setRes] = useState({ loading: true, result: null, error: null });

  // Función para obtener los datos desde la API
  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch(url, {
          method: "GET",
          headers: {
            Authorization: `Bearer ${token}`,
            "Content-Type": "application/json"
          }
        });

        // Verificar si la respuesta es exitosa
        if (!response.ok) {
          throw new Error("Error al obtener los datos");
        }

        const data = await response.json();
        setRes({ loading: false, result: data, error: null });
      } catch (error) {
        setRes({ loading: false, result: null, error: error.message });
      }
    };

    fetchData();
  }, []);

  // Componente de tabla con datos o mensajes de error/cargando
  return (
    <Card>
      <Card.Header>Direcciones</Card.Header>
      <Card.Body>
        <Table striped bordered hover size="sm">
          <thead>
            <tr>
              <th style={{ width: '55%' }}>Dirección</th>
              <th style={{ width: '15%' }}>Abreviatura</th>
              <th style={{ width: '15%' }}>Estatus</th>
              <th style={{ width: '15%' }}>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            {renglones(res)}
          </tbody>
        </Table>
      </Card.Body>
    </Card>
  );
}

// Función para manejar la renderización de las filas en la tabla
function renglones(res) {
  if (res.loading) {
    return (
      <tr>
        <td colSpan={4}><strong>Cargando...</strong></td>
      </tr>
    );
  }

  if (res.error) {
    return (
      <tr>
        <td colSpan={4}><strong>Error: {res.error}</strong></td>
      </tr>
    );
  }

  if (!res.result || !res.result.data || res.result.data.length === 0) {
    return (
      <tr>
        <td colSpan={4}><strong>No hay direcciones disponibles.</strong></td>
      </tr>
    );
  }

  return res.result.data.map((r, index) => (
    <tr key={index}>
      <td>{r.direccion}</td>
      <td>{r.abreviatura}</td>
      <td>{r.estatus}</td>
      <td>&nbsp;</td>
    </tr>
  ));
}
