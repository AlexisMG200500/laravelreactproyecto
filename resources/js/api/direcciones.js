import { apiDelete, apiGet, apiPost, apiPut } from './client';
import { API_DIRECCIONES } from '../components/Constantes';

export const getDirecciones = (page = 1) =>
    apiGet(`${API_DIRECCIONES}?page=${page}`);

export const getDireccion = (id) =>
    apiGet(`${API_DIRECCIONES}/${id}`);

export const createDireccion = (data) =>
    apiPost(API_DIRECCIONES, data);

export const updateDireccion = (id, data) =>
    apiPut(`${API_DIRECCIONES}/${id}`, data);

export const deleteDireccion = (id) =>
    apiDelete(`${API_DIRECCIONES}/${id}`);
