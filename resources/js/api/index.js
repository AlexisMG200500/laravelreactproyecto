import { apiDelete, apiGet, apiPost, apiPut } from './client';
import {
    API_ASIGNATURAS,
    API_CARRERAS,
    API_CUATRIMESTRES,
    API_DETALLES_FORMATOS_LABORATORIOS,
    API_DIAS_FERIADOS,
    API_DIRECCIONES,
    API_FORMATOS_LABORATORIOS,
    API_GRUPOS_LABORATORIOS,
    API_LABORATORIOS,
    API_MATERIALES,
    API_UNIDADES_MEDIDAS,
} from '../components/Constantes';

const makeResource = (baseUrl) => ({
    list: (page = 1, params = {}) => {
        const qs = new URLSearchParams({ page, ...params });
        return apiGet(`${baseUrl}?${qs}`);
    },
    get: (id) => apiGet(`${baseUrl}/${id}`),
    create: (data) => apiPost(baseUrl, data),
    update: (id, data) => apiPut(`${baseUrl}/${id}`, data),
    remove: (id) => apiDelete(`${baseUrl}/${id}`),
});

export const direccionesApi = makeResource(API_DIRECCIONES);
export const carrerasApi = makeResource(API_CARRERAS);
export const asignaturasApi = makeResource(API_ASIGNATURAS);
export const laboratoriosApi = makeResource(API_LABORATORIOS);
export const cuatrimestresApi = makeResource(API_CUATRIMESTRES);
export const unidadesMedidasApi = makeResource(API_UNIDADES_MEDIDAS);
export const materialesApi = makeResource(API_MATERIALES);
export const diasFeriadosApi = makeResource(API_DIAS_FERIADOS);
export const gruposLaboratoriosApi = makeResource(API_GRUPOS_LABORATORIOS);
export const formatosLaboratoriosApi = makeResource(API_FORMATOS_LABORATORIOS);
export const detallesFormatosApi = makeResource(API_DETALLES_FORMATOS_LABORATORIOS);
