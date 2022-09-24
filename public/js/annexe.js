const area = document.getElementById('primero');
const areados = document.getElementById('segundo');
const areatres = document.getElementById('tercero');
const areacuatro = document.getElementById('cuarto');
const resultado = document.getElementById('resultados');


area.addEventListener('click', () => {
const elemento = `

<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-1" type="radio" value="1" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-1"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Promover y apoyar el fomento a la vocación de las y los humanistas, científicos, tecnólogos e innovadores comprometidos con la atención y solución de problemáticas nacionales prioritarios.
    </label>
        <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye las acciones formación y consolidación.</label>
    </div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-2" type="radio" value="2" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-2"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Identificación de ineficiencias y riesgos de corrupción en las distintas etapas de la gestión pública, a fin de prevenir y reducir los márgenes de discrecionalidad en la toma de decisiones o el uso inadecuado de los recursos públicos.
    </label>
        <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Puede incluir o no el uso de tecnologías de la información y la comunicación para impulsar que la transparencia y la rendición de cuentas democrática, simple sea eficiente y expedita.</label>
    </div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-5" type="radio" value="5" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-5"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Atender la vulnerabilidad ante el cambio climático, el fortalecimiento de la resiliencia y las capacidad humana e institucional de adaptación, mitigación y reconstrucción.
    </label>
        <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye reducir el riesgo de desastres y la respuesta y atención de las emergencias y desastres provocados por el cambio climático, fenómenos naturales o actividades humanas, para disminuir su impacto y promover la reconstrucción.</label>
    </div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-6" type="radio" value="6" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-6"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Uso de tecnologías bajas en carbono y fuentes de generación de energía renovable que promuevan la reducción de la emisión de contaminantes a la atmosfera, el suelo y el agua.
    </label>
    </div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-7" type="radio" value="7" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-7"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Regionalización para la atención de problemas públicos.
    </label>
    </div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-8" type="radio" value="8" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-8"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Mejora del ordenamiento territorial y ecológico de los asentamientos humanos.
    </label>
    </div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-11" type="radio" value="11" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-11"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Problemáticas vinculadas a la migración.
    </label>
    </div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-13" type="radio" value="13" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-13"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Mejorar el equipamiento de los espacios educativos 
    </label>
    </div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-14" type="radio" value="14" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-14"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Producción sostenible de alimentos que respondan a las necesidades nutricionales e impulsen la soberanía alimentaria.
    </label>
    </div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-15" type="radio" value="15" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-15"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Mejorar y ampliar el equipamiento de salud y rehabilitación.
    </label>
    </div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-17" type="radio" value="17" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-17"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Promover la vigilancia y supervisión ambiental eficaz, eficiente, transparente y participativa para prevenir y controlar la contaminación y la degradación ambiental.
    </label>
        <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye temas de agua, suelo, aire, ruido, etc.</label>
    </div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-18" type="radio" value="18" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-18"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Impulso a la movilidad accesible y sostenible priorizando los modos de transporte público eficientes y bajos en emisiones, así como la movilidad no motorizada.
    </label>
    </div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-23" type="radio" value="23" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-23"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Potenciar las capacidades locales de producción y el aprovechamiento sostenible de los recursos naturales y minerales, a través de la innovación.
    </label>
    </div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-24" type="radio" value="24" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-24"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Incrementar de manera sostenible la producción agropecuaria y pesquera, mediante infraestructura y equipamiento, la integración de cadenas de valor y el fortalecimiento de la sanidad e inocuidad.
    </label>
    </div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
    <input required id="bordered-radio-25" type="radio" value="25" name="fk_idAnnexe"
    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="bordered-radio-25"
    class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
        Aprovechar de manera sostenible el potencial agroecológico a través del uso eficiente del suelo y agua.
    </label>
    </div>
`
;
                            resultado.innerHTML = elemento;
                        })

                        areados.addEventListener('click', () => {
                            const elementodos = `
                            
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-1" type="radio" value="1" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-1"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Promover y apoyar el fomento a la vocación de las y los humanistas, científicos, tecnólogos e innovadores comprometidos con la atención y solución de problemáticas nacionales prioritarios.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye las acciones formación y consolidación.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-2" type="radio" value="2" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-2"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Identificación de ineficiencias y riesgos de corrupción en las distintas etapas de la gestión pública, a fin de prevenir y reducir los márgenes de discrecionalidad en la toma de decisiones o el uso inadecuado de los recursos públicos.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Puede incluir o no el uso de tecnologías de la información y la comunicación para impulsar que la transparencia y la rendición de cuentas democrática, simple sea eficiente y expedita.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-3" type="radio" value="3" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-3"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    El desarrollo de medidas especiales para lograr la igualdad sustantiva, nivelación y/o protección especial a grupos y regiones marginadas o vulnerables.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Los grupos pueden incluir personas, organizaciones, instituciones, municipios e incluso regiones.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-4" type="radio" value="4" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-4"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    El aprovechamiento sustentable y conservación de los recursos naturales, áreas naturales protegidas y sitios RAMSAR a través de la innovación.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluida la conservación y protección de los ecosistemas terrestres y acuáticos, así́ como la biodiversidad para garantizar la provisión y calidad de sus servicios ambientales.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-5" type="radio" value="5" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-5"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Atender la vulnerabilidad ante el cambio climático, el fortalecimiento de la resiliencia y las capacidad humana e institucional de adaptación, mitigación y reconstrucción.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye reducir el riesgo de desastres y la respuesta y atención de las emergencias y desastres provocados por el cambio climático, fenómenos naturales o actividades humanas, para disminuir su impacto y promover la reconstrucción.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-7" type="radio" value="7" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-7"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Regionalización para la atención de problemas públicos.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-8" type="radio" value="8" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-8"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Mejora del ordenamiento territorial y ecológico de los asentamientos humanos.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-9" type="radio" value="9" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-9"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Garantizar el ejercicio pleno de los derechos de las mujeres y una vida libre de violencia.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-10" type="radio" value="10" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-10"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Prevención de la violencia y el delito.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluida cualquier tipo de violencia, por ejemplo, acoso escolar, violencia institucional, inseguridad, etc.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-11" type="radio" value="11" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-11"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Problemáticas vinculadas a la migración.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-12" type="radio" value="12" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-12"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Fortalecer la profesionalización de los servidores públicos, así́ como su sensibilización, capacitación, promover su ética e integridad.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye personal docente, funcionarios y trabajadores de la administración pública en cualquier nivel de gobierno.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-13" type="radio" value="13" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-13"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Mejorar el equipamiento de los espacios educativos 
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-14" type="radio" value="14" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-14"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Producción sostenible de alimentos que respondan a las necesidades nutricionales e impulsen la soberanía alimentaria.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-15" type="radio" value="15" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-15"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Mejorar y ampliar el equipamiento de salud y rehabilitación.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-16" type="radio" value="16" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-16"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Promoción y prevención en salud.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-17" type="radio" value="17" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-17"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Promover la vigilancia y supervisión ambiental eficaz, eficiente, transparente y participativa para prevenir y controlar la contaminación y la degradación ambiental.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye temas de agua, suelo, aire, ruido, etc.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-18" type="radio" value="18" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-18"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Impulso a la movilidad accesible y sostenible priorizando los modos de transporte público eficientes y bajos en emisiones, así como la movilidad no motorizada.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-19" type="radio" value="19" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-19"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Salvaguardar y difundir la riqueza patrimonial de México, tanto material como inmaterial, así como promover la apropiación social de las humanidades, las ciencias y las tecnologías.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluida la diversidad cultural y lingüística.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-22" type="radio" value="22" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-22"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Impulsar el desarrollo y adopción de nuevas tecnologías en los sectores productivos.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-23" type="radio" value="23" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-23"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Potenciar las capacidades locales de producción y el aprovechamiento sostenible de los recursos naturales y minerales, a través de la innovación.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-24" type="radio" value="24" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-24"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Incrementar de manera sostenible la producción agropecuaria y pesquera, mediante infraestructura y equipamiento, la integración de cadenas de valor y el fortalecimiento de la sanidad e inocuidad.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-25" type="radio" value="25" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-25"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Aprovechar de manera sostenible el potencial agroecológico a través del uso eficiente del suelo y agua.
</label>
</div>
                            
`;
                            resultado.innerHTML = elementodos;
                        })
                        areatres.addEventListener('click', () => {
                            const elementodos = `
                            
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-1" type="radio" value="1" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-1"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Promover y apoyar el fomento a la vocación de las y los humanistas, científicos, tecnólogos e innovadores comprometidos con la atención y solución de problemáticas nacionales prioritarios.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye las acciones formación y consolidación.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-2" type="radio" value="2" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-2"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Identificación de ineficiencias y riesgos de corrupción en las distintas etapas de la gestión pública, a fin de prevenir y reducir los márgenes de discrecionalidad en la toma de decisiones o el uso inadecuado de los recursos públicos.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Puede incluir o no el uso de tecnologías de la información y la comunicación para impulsar que la transparencia y la rendición de cuentas democrática, simple sea eficiente y expedita.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-4" type="radio" value="4" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-4"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    El aprovechamiento sustentable y conservación de los recursos naturales, áreas naturales protegidas y sitios RAMSAR a través de la innovación.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluida la conservación y protección de los ecosistemas terrestres y acuáticos, así́ como la biodiversidad para garantizar la provisión y calidad de sus servicios ambientales.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-7" type="radio" value="7" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-7"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Regionalización para la atención de problemas públicos.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-8" type="radio" value="8" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-8"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Mejora del ordenamiento territorial y ecológico de los asentamientos humanos.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-11" type="radio" value="11" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-11"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Problemáticas vinculadas a la migración.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-14" type="radio" value="14" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-14"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Producción sostenible de alimentos que respondan a las necesidades nutricionales e impulsen la soberanía alimentaria.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-19" type="radio" value="19" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-19"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Salvaguardar y difundir la riqueza patrimonial de México, tanto material como inmaterial, así como promover la apropiación social de las humanidades, las ciencias y las tecnologías.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluida la diversidad cultural y lingüística.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-20" type="radio" value="20" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-20"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Promover el desarrollo de habilidades, innovación y herramientas tecnológicas a través de la incubación y el acompañamiento de actividades productivas.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-21" type="radio" value="21" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-21"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Fortalecer la protección a los derechos de propiedad industrial e intelectual, que vincule a la comunidad científica con los sectores público, social y privado.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-23" type="radio" value="23" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-23"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Potenciar las capacidades locales de producción y el aprovechamiento sostenible de los recursos naturales y minerales, a través de la innovación.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-24" type="radio" value="24" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-24"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Incrementar de manera sostenible la producción agropecuaria y pesquera, mediante infraestructura y equipamiento, la integración de cadenas de valor y el fortalecimiento de la sanidad e inocuidad.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-25" type="radio" value="25" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-25"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Aprovechar de manera sostenible el potencial agroecológico a través del uso eficiente del suelo y agua.
</label>
</div>

`;
                            resultado.innerHTML = elementodos;
                        })
                        areacuatro.addEventListener('click', () => {
                            const elementodos = `
                            
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-1" type="radio" value="1" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-1"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Promover y apoyar el fomento a la vocación de las y los humanistas, científicos, tecnólogos e innovadores comprometidos con la atención y solución de problemáticas nacionales prioritarios.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye las acciones formación y consolidación.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-2" type="radio" value="2" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-2"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Identificación de ineficiencias y riesgos de corrupción en las distintas etapas de la gestión pública, a fin de prevenir y reducir los márgenes de discrecionalidad en la toma de decisiones o el uso inadecuado de los recursos públicos.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Puede incluir o no el uso de tecnologías de la información y la comunicación para impulsar que la transparencia y la rendición de cuentas democrática, simple sea eficiente y expedita.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-4" type="radio" value="4" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-4"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    El aprovechamiento sustentable y conservación de los recursos naturales, áreas naturales protegidas y sitios RAMSAR a través de la innovación.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluida la conservación y protección de los ecosistemas terrestres y acuáticos, así́ como la biodiversidad para garantizar la provisión y calidad de sus servicios ambientales.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-5" type="radio" value="5" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-5"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Atender la vulnerabilidad ante el cambio climático, el fortalecimiento de la resiliencia y las capacidad humana e institucional de adaptación, mitigación y reconstrucción.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye reducir el riesgo de desastres y la respuesta y atención de las emergencias y desastres provocados por el cambio climático, fenómenos naturales o actividades humanas, para disminuir su impacto y promover la reconstrucción.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-6" type="radio" value="6" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-6"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Uso de tecnologías bajas en carbono y fuentes de generación de energía renovable que promuevan la reducción de la emisión de contaminantes a la atmosfera, el suelo y el agua.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-7" type="radio" value="7" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-7"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Regionalización para la atención de problemas públicos.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-13" type="radio" value="13" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-13"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Mejorar el equipamiento de los espacios educativos 
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-14" type="radio" value="14" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-14"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Producción sostenible de alimentos que respondan a las necesidades nutricionales e impulsen la soberanía alimentaria.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-15" type="radio" value="15" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-15"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Mejorar y ampliar el equipamiento de salud y rehabilitación.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-17" type="radio" value="17" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-17"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Promover la vigilancia y supervisión ambiental eficaz, eficiente, transparente y participativa para prevenir y controlar la contaminación y la degradación ambiental.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluye temas de agua, suelo, aire, ruido, etc.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-18" type="radio" value="18" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-18"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Impulso a la movilidad accesible y sostenible priorizando los modos de transporte público eficientes y bajos en emisiones, así como la movilidad no motorizada.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-19" type="radio" value="19" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-19"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Salvaguardar y difundir la riqueza patrimonial de México, tanto material como inmaterial, así como promover la apropiación social de las humanidades, las ciencias y las tecnologías.
</label>
    <label class="py-4 ml-2 w-full text-sm font-medium text-gray-700 dark:text-gray-700">Nota: Incluida la diversidad cultural y lingüística.</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-20" type="radio" value="20" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-20"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Promover el desarrollo de habilidades, innovación y herramientas tecnológicas a través de la incubación y el acompañamiento de actividades productivas.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-21" type="radio" value="21" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-21"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Fortalecer la protección a los derechos de propiedad industrial e intelectual, que vincule a la comunidad científica con los sectores público, social y privado.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-22" type="radio" value="22" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-22"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Impulsar el desarrollo y adopción de nuevas tecnologías en los sectores productivos.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-23" type="radio" value="23" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-23"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Potenciar las capacidades locales de producción y el aprovechamiento sostenible de los recursos naturales y minerales, a través de la innovación.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-24" type="radio" value="24" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-24"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Incrementar de manera sostenible la producción agropecuaria y pesquera, mediante infraestructura y equipamiento, la integración de cadenas de valor y el fortalecimiento de la sanidad e inocuidad.
</label>
</div>
<div class="md:w-full flex flex-wrap items-center pl-4 rounded border border-gray-200 dark:border-gray-700">
<input required id="bordered-radio-25" type="radio" value="25" name="fk_idAnnexe"
class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
<label for="bordered-radio-25"
class="py-4 ml-2 w-[90%] text-sm font-medium text-gray-700 dark:text-gray-700">
    Aprovechar de manera sostenible el potencial agroecológico a través del uso eficiente del suelo y agua.
</label>
</div>
                            
`;
                            resultado.innerHTML = elementodos;
                        })