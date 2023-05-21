@extends('layouts.app')

@section('titulo')
    Conócenos
@endsection

@section('content-area')
    <div class="conocenos">
        <div class="contenedor container-conocenos">
            <div class="conocenos__pasado">
                <div class="conocenos__pasado--titulo">
                    <h3>Pasado</h3>
                </div>
                <div class="conocenos__pasado--contenido">
                    <div class="conocenos__pasado--imagen">
                        <img src="{{ asset('imgs/slider/IMG_20230501_170808.jpg') }}" alt="Imagen Pádel Brañuelas Pasado">
                    </div>
                    <p>El proyecto Pádel Brañuelas tiene un pasado fascinante que se remonta a unos años atrás. Este
                        complejo deportivo, ubicado en la encantadora localidad de Brañuelas, surgió como una iniciativa
                        para fomentar la práctica del pádel y promover un estilo de vida saludable en la comunidad.</p>
                    <p>La historia de Pádel Brañuelas comenzó en el año 2018, cuando un grupo de entusiastas del pádel
                        decidió convertir un terreno abandonado en un moderno complejo deportivo. Con mucho esfuerzo y
                        dedicación, se iniciaron las obras de construcción, transformando la antigua parcela en una
                        instalación de primer nivel para la práctica de este apasionante deporte.</p>
                    <p>La inauguración de Pádel Brañuelas tuvo lugar en 2020 y fue todo un éxito. La comunidad local se
                        mostró entusiasmada y rápidamente se convirtió en un punto de encuentro para los amantes del pádel
                        de todas las edades y niveles de habilidad. Desde entonces, el complejo ha sido un centro neurálgico
                        de actividad deportiva, donde se han celebrado numerosos torneos, ligas y eventos relacionados con
                        el pádel.</p>
                </div>
            </div>
            <div class="conocenos__presente">
                <div class="conocenos__presente--titulo">
                    <h3>Presente</h3>
                </div>
                <div class="conocenos__presente--contenido">
                    <div class="conocenos__presente--imagen">
                        <img src="{{ asset('imgs/slider/IMG_20230501_170834.jpg') }}" alt="Imagen Pádel Brañuelas Pasado">
                    </div>
                    <p>En el presente, el proyecto Pádel Brañuelas continúa siendo un lugar vibrante y activo para los
                        amantes del pádel. Con el paso de los años, el complejo ha consolidado su reputación como uno de los
                        destinos preferidos para la práctica de este apasionante deporte, tanto para residentes locales como
                        para visitantes de otras regiones.</p>
                    <p>La comunidad de jugadores en Pádel Brañuelas es diversa y entusiasta. Desde aficionados que buscan
                        divertirse y mejorar su juego, hasta jugadores más experimentados que participan en torneos y ligas
                        competitivas, el complejo acoge a personas de todos los niveles y edades. La atmósfera es amigable y
                        acogedora, lo que fomenta el intercambio de conocimientos, la camaradería y el espíritu deportivo
                        entre los participantes.</p>
                    <p>En resumen, el presente del proyecto Pádel Brañuelas es un reflejo de su éxito y popularidad en la
                        comunidad. Es un lugar dinámico y en constante evolución que brinda a los jugadores un entorno de
                        alta calidad para la práctica del pádel, así como oportunidades de socialización y crecimiento
                        personal. Pádel Brañuelas continúa siendo un referente en el mundo del pádel, promoviendo una vida
                        activa y saludable a través de este apasionante deporte.</p>
                </div>
            </div>
            <div class="conocenos__futuro">
                <div class="conocenos__futuro--titulo">
                    <h3>Futuro</h3>
                </div>
                <div class="conocenos__futuro--contenido">
                    <div class="conocenos__futuro--imagen">
                        <img src="{{ asset('imgs/slider/IMG_20230501_170854.jpg') }}" alt="Imagen Pádel Brañuelas Pasado">
                    </div>
                    <p>El futuro del proyecto Pádel Brañuelas se vislumbra emocionante y lleno de promesas. Con una base
                        sólida y una reputación establecida, el complejo se encuentra en una posición privilegiada para
                        seguir creciendo y adaptándose a las necesidades cambiantes de la comunidad de jugadores de pádel.
                    </p>
                    <p>Una de las metas del proyecto Pádel Brañuelas es expandir sus instalaciones para poder dar cabida a
                        un mayor número de jugadores y ofrecer una experiencia aún más completa. Se planea la construcción
                        de nuevas canchas de pádel, equipadas con la última tecnología y diseños innovadores que brinden un
                        entorno de juego excepcional. Además, se podrían agregar áreas adicionales, como zonas de
                        calentamiento, salas de entrenamiento y espacios de recuperación, para satisfacer las demandas de
                        los jugadores más exigentes.</p>
                    <p>En cuanto a eventos y actividades, el futuro de Pádel Brañuelas se perfila lleno de emocionantes
                        torneos y competiciones a nivel local, regional e incluso nacional. El complejo se esforzará por
                        atraer a jugadores destacados y celebridades del mundo del pádel, lo que brindará a la comunidad
                        local y a los visitantes la oportunidad de presenciar partidos de alto nivel y experimentar la
                        emoción de este deporte en su máxima expresión.</p>
                    <p>En resumen, el futuro del proyecto Pádel Brañuelas es prometedor y lleno de potencial. Con su enfoque
                        en la expansión, la tecnología, la sostenibilidad y la inclusión, el complejo continuará siendo un
                        referente en el mundo del pádel, brindando a los jugadores una experiencia excepcional y promoviendo
                        los valores positivos del deporte. Pádel Brañuelas seguirá siendo un lugar donde los sueños y las
                        pasiones se encuentran, y donde la comunidad podrá disfrutar de un estilo de vida activo y salud.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
