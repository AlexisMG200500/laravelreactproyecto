const fs = require('fs');
const carbone = require('carbone');
const path = require('path');

// 📌 Capturar la ruta de salida desde Laravel
const outputPath = process.argv[2];

if (!outputPath) {
    console.error('❌ Error: No se proporcionó una ruta de salida.');
    process.exit(1);
}

var data = {
    alumno: {
        nombre_completo: 'Lorem Ipsum Dolor Sit Amet',
        correo: 'alumno@utvtol.edu.mx'
    },
    competencias: [
        { competencia: 'Autogestión del aprendizaje', calificacion: 10, letra: 'DIEZ PUNTO CERO' },
        { competencia: 'Proyección personal y profesional', calificacion: 10, letra: 'DIEZ PUNTO CERO' },
        { competencia: 'Manejo de espacios y cantidades', calificacion: 10, letra: 'DIEZ PUNTO CERO' },
        { competencia: 'Comunicación para la interacción social', calificacion: 10, letra: 'DIEZ PUNTO CERO' },
        { competencia: 'Procesamiento de información por medios digitales', calificacion: 10, letra: 'DIEZ PUNTO CERO' },
        { competencia: 'Resolución de problemas', calificacion: 10, letra: 'DIEZ PUNTO CERO' },
        { competencia: 'Desarrollo ciudadano', calificacion: 10, letra: 'DIEZ PUNTO CERO' }
    ]
};

// 📌 Generar el documento
carbone.render(path.join(__dirname, 'certificado.docx'), data, function(err, result) {
    if (err) {
        console.error('❌ Error al generar el documento:', err);
        process.exit(1);
    }

    try {
        fs.writeFileSync(outputPath, result);
        console.log('✅ Archivo guardado en:', outputPath);
    } catch (writeErr) {
        console.error('❌ Error al guardar el archivo:', writeErr);
        process.exit(1);
    }
});
