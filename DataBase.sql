--
-- PostgreSQL database dump
--

-- Dumped from database version 13.18 (Debian 13.18-0+deb11u1)
-- Dumped by pg_dump version 13.18 (Debian 13.18-0+deb11u1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: categoria; Type: TABLE; Schema: public; Owner: tdiw-f6
--

CREATE TABLE public.categoria (
    id integer NOT NULL,
    nom character varying,
    img character varying,
    direccio character varying
);


ALTER TABLE public.categoria OWNER TO "tdiw-f6";

--
-- Name: categoria_id_seq; Type: SEQUENCE; Schema: public; Owner: tdiw-f6
--

CREATE SEQUENCE public.categoria_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categoria_id_seq OWNER TO "tdiw-f6";

--
-- Name: categoria_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tdiw-f6
--

ALTER SEQUENCE public.categoria_id_seq OWNED BY public.categoria.id;


--
-- Name: comanda; Type: TABLE; Schema: public; Owner: tdiw-f6
--

CREATE TABLE public.comanda (
    id integer NOT NULL,
    id_usuari integer NOT NULL,
    data timestamp without time zone,
    total numeric(10,2)
);


ALTER TABLE public.comanda OWNER TO "tdiw-f6";

--
-- Name: comanda_id_seq; Type: SEQUENCE; Schema: public; Owner: tdiw-f6
--

CREATE SEQUENCE public.comanda_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comanda_id_seq OWNER TO "tdiw-f6";

--
-- Name: comanda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tdiw-f6
--

ALTER SEQUENCE public.comanda_id_seq OWNED BY public.comanda.id;


--
-- Name: comanda_producte; Type: TABLE; Schema: public; Owner: tdiw-f6
--

CREATE TABLE public.comanda_producte (
    id integer NOT NULL,
    id_comanda integer,
    id_producte integer,
    quantitat integer DEFAULT 1 NOT NULL
);


ALTER TABLE public.comanda_producte OWNER TO "tdiw-f6";

--
-- Name: comanda_producte_id_seq; Type: SEQUENCE; Schema: public; Owner: tdiw-f6
--

CREATE SEQUENCE public.comanda_producte_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comanda_producte_id_seq OWNER TO "tdiw-f6";

--
-- Name: comanda_producte_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tdiw-f6
--

ALTER SEQUENCE public.comanda_producte_id_seq OWNED BY public.comanda_producte.id;


--
-- Name: producte; Type: TABLE; Schema: public; Owner: tdiw-f6
--

CREATE TABLE public.producte (
    id integer NOT NULL,
    id_categoria integer NOT NULL,
    nom character varying,
    img character varying,
    preu numeric(10,2),
    descripcio character varying
);


ALTER TABLE public.producte OWNER TO "tdiw-f6";

--
-- Name: producte_id_seq; Type: SEQUENCE; Schema: public; Owner: tdiw-f6
--

CREATE SEQUENCE public.producte_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.producte_id_seq OWNER TO "tdiw-f6";

--
-- Name: producte_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tdiw-f6
--

ALTER SEQUENCE public.producte_id_seq OWNED BY public.producte.id;


--
-- Name: usuari; Type: TABLE; Schema: public; Owner: tdiw-f6
--

CREATE TABLE public.usuari (
    id integer NOT NULL,
    mail character varying NOT NULL,
    nom character varying NOT NULL,
    direccio character varying NOT NULL,
    poblacio character varying NOT NULL,
    cp integer NOT NULL,
    contrasenya character varying(255) NOT NULL
);


ALTER TABLE public.usuari OWNER TO "tdiw-f6";

--
-- Name: usuari_id_seq; Type: SEQUENCE; Schema: public; Owner: tdiw-f6
--

CREATE SEQUENCE public.usuari_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuari_id_seq OWNER TO "tdiw-f6";

--
-- Name: usuari_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: tdiw-f6
--

ALTER SEQUENCE public.usuari_id_seq OWNED BY public.usuari.id;


--
-- Name: categoria id; Type: DEFAULT; Schema: public; Owner: tdiw-f6
--

ALTER TABLE ONLY public.categoria ALTER COLUMN id SET DEFAULT nextval('public.categoria_id_seq'::regclass);


--
-- Name: comanda id; Type: DEFAULT; Schema: public; Owner: tdiw-f6
--

ALTER TABLE ONLY public.comanda ALTER COLUMN id SET DEFAULT nextval('public.comanda_id_seq'::regclass);


--
-- Name: comanda_producte id; Type: DEFAULT; Schema: public; Owner: tdiw-f6
--

ALTER TABLE ONLY public.comanda_producte ALTER COLUMN id SET DEFAULT nextval('public.comanda_producte_id_seq'::regclass);


--
-- Name: producte id; Type: DEFAULT; Schema: public; Owner: tdiw-f6
--

ALTER TABLE ONLY public.producte ALTER COLUMN id SET DEFAULT nextval('public.producte_id_seq'::regclass);


--
-- Name: usuari id; Type: DEFAULT; Schema: public; Owner: tdiw-f6
--

ALTER TABLE ONLY public.usuari ALTER COLUMN id SET DEFAULT nextval('public.usuari_id_seq'::regclass);


--
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: tdiw-f6
--

COPY public.categoria (id, nom, img, direccio) FROM stdin;
3	Aires Acondicionats	aire_acondicionat	aires_acondicionats
4	Ventiladors de paret	ventilador_paret	ventiladors_paret
7	Molinets de Vent	molinet	molinets
2	Ventalls	ventall	ventalls
1	Ventiladors	ventilador	ventiladors
5	Secadors	secador	secadors
\.


--
-- Data for Name: comanda; Type: TABLE DATA; Schema: public; Owner: tdiw-f6
--

COPY public.comanda (id, id_usuari, data, total) FROM stdin;
21	1	2024-12-31 22:37:41.005155	326.85
22	1	2024-12-31 22:38:38.299674	2964.50
23	1	2024-12-31 22:51:15.345193	41.70
24	1	2024-12-31 23:09:24.486288	149.80
25	1	2024-12-31 23:10:00.12008	29.99
26	1	2024-12-31 23:11:47.314283	6.95
27	1	2024-12-31 23:19:11.920961	1492.15
28	1	2025-01-01 03:00:05.953559	899.90
29	1	2025-01-01 03:01:56.442881	733.88
30	1	2025-01-01 03:03:36.430523	1403.75
31	34	2025-01-01 12:02:25.762219	740.83
32	1	2025-01-02 10:03:22.129344	883.98
33	1	2025-01-07 11:39:44.565705	185.85
34	1	2025-01-20 16:16:32.770303	239.90
35	39	2025-01-28 19:18:29.81001	239.90
\.


--
-- Data for Name: comanda_producte; Type: TABLE DATA; Schema: public; Owner: tdiw-f6
--

COPY public.comanda_producte (id, id_comanda, id_producte, quantitat) FROM stdin;
26	21	14	2
27	21	22	1
28	22	4	110
29	23	22	6
30	24	20	2
31	24	17	2
32	25	18	1
33	26	22	1
34	27	15	3
35	27	7	1
36	27	3	23
37	28	15	2
38	29	22	2
39	29	13	2
40	30	15	3
41	30	4	2
42	31	22	3
43	31	13	2
44	32	13	2
45	32	12	1
46	33	5	1
47	33	8	2
48	34	10	2
49	35	10	2
\.


--
-- Data for Name: producte; Type: TABLE DATA; Schema: public; Owner: tdiw-f6
--

COPY public.producte (id, id_categoria, nom, img, preu, descripcio) FROM stdin;
12	3	Cecotec ForceClima 7100	https://m.media-amazon.com/images/I/71yLX8e86jL._AC_SX679_.jpg	164.00	El Aire Acondicionado Portátil Cecotec ForceClima 7100 Soundless ofereix una frescor silenciosa i potent amb una capacitat de 7000 BTU, ideal per espais de fins a 20 m². Disposa de 4 modes de funcionament i 2 velocitats per adaptar-se a les teves necessitats, tot amb el confort del mando a distància. La pantalla LED facilita el control i la visualització dels ajustos. Inclou un kit d'instal·lació de finestra per a una instal·lació fàcil. Amb el seu sistema Soundless, gaudiràs d'un ambient fresc sense sorolls molestos. Perfecte per a la teva llar o oficina.
13	3	Split Max Libiyi 2024	https://m.media-amazon.com/images/I/51BHUS34J6L._AC_SL1500_.jpg	359.99	El Aire Acondicionado Split Max Libiyi 2024 és la solució perfecta per mantenir el teu espai còmode tot l'any. Amb funció calor/frío, ofereix un rendiment potent i versàtil per a tot tipus d'ambients. Aquest model es pot instal·lar en la paret o com aire acondicionat de finestra, adaptant-se a les teves necessitats. Incorpora un temporitzador per programar l'encès o apagat de manera pràctica. Amb disseny modern i eficient, és ideal per refrescar o escalfar espais mitjans i grans, aportant confort i estil a la teva llar o oficina.
3	7	Molinet de San Martí	https://m.media-amazon.com/images/I/71vK7HcTz3L.__AC_SY300_SX300_QL70_ML2_.jpg	4.45	Molinet de vent giratori ideal per al jardí, el césped o el pati, que funciona com a repel·lent de pàjaros. A més, aporta un toc decoratiu i alegre a l'espai exterior.
1	1	Honeywell TurboForce	https://m.media-amazon.com/images/I/51-k6oFSs2L._AC_SL1000_.jpg	28.99	Ventilador potent amb funcionament silenciós, inclinació ajustable fins a 90° i tres nivells de velocitat. Ideal per a una refrigeració personalitzada i sense soroll.
2	1	Jocca	https://m.media-amazon.com/images/I/81oG++1EidL._AC_SY300_SX300_.jpg	19.99	Ventilador de sobretaula de 30 cm de diàmetre, amb potència de 40 W, tres velocitats i tres aspes. Inclou sistema d'oscil·lació i capçal reclinable.
4	1	Orbegozo PW 1230	https://m.media-amazon.com/images/I/71M7n4owKJL._AC_SL1191_.jpg	26.95	L’Orbegozo PW 1230 és perfecte per mantenir qualsevol espai fresc. Amb aspes metàl·liques de 30 cm, 3 velocitats i inclinació regulable, s’adapta a les teves necessitats. Inclou nansa de transport, reixa de seguretat i té una potència de 45 W. Compacte, segur i fàcil d’utilitzar.
5	1	Orbegozo TF 0133	https://m.media-amazon.com/images/I/71vJgmYSo-L._AC_SL1191_.jpg	25.95	El Ventilador Orbegozo TF 0133 és la solució perfecta per refrescar qualsevol habitació. Amb un diàmetre d’hèlice de 30 cm i 3 velocitats, ofereix un flux d’aire adaptat a les teves necessitats. El seu disseny oscil·lant permet una distribució uniforme de l'aire, mentre que l'asa fa que sigui fàcil de transportar. Amb una potència de 40 W i piloto luminoso LED, és ideal per a qualsevol espai. Elegant i funcional en color blanc.
6	1	Orbegozo BF 1030	https://m.media-amazon.com/images/I/71aYHxUk3yL._AC_SX679_.jpg	29.95	El Ventilador Orbegozo BF 1030 ofereix un rendiment excel·lent amb les seves 5 aspes i 3 velocitats regulables per a una ventilació òptima. Disposa de temporitzador per adaptar el temps d'ús a les teves necessitats i una funció antivuelco per a més seguretat. Amb una potència de 45 W, és perfecte per refrescar qualsevol espai de manera eficient i segura. Ideal per a la teva llar o oficina.
7	1	Torre Taurus New Babel	https://m.media-amazon.com/images/I/51-G8Eg-g+L._AC_SX679_.jpg	39.95	El Ventilador de Torre Taurus New Babel ofereix una fresca i còmoda solució per als dies calorosos. Amb una potència de 50 W i una alçada de 86 cm, disposa de 3 velocitats per adaptar-se a les teves necessitats. El Timer de 2 hores i la funció Auto Off garanteixen un ús còmode i segur. A més, la funció oscil·lant permet una millor distribució de l'aire i la base antideslizante assegura estabilitat. Els selectores giratoris i el disseny en gris el fan una opció elegant per qualsevol espai.
8	4	Mellerware Brizy Bright	https://m.media-amazon.com/images/I/61QAOZ4GwhL._AC_SX679_.jpg	79.95	El Ventilador de Techo Mellerware Brizy Bright combina disseny i funcionalitat. Amb 3 aspes de 132 cm i una potència de 30 W, ofereix 6 velocitats per adaptar-se a qualsevol moment. El seu mode ultra silenciós i la funció Verano-Invierno garanteixen confort durant tot l'any. Incorpora un temporitzador i un LED per a un ambient més agradable. El comandament a distància facilita el seu control i el seu acabat en Lightwood aporta un toc d’elegància a qualsevol espai. Perfecte per a qui busca frescor i estil.
9	4	Cecotec Aero 4200	https://m.media-amazon.com/images/I/41qKeF1PUgL._AC_SL1000_.jpg	75.95	El Ventilador de Techo Cecotec EnergySilence Aero 4200 combina tecnologia avançada i disseny modern. Amb aspas retràctils i un diàmetre de 42", aquest ventilador ofereix una potència de 30W i un motor DC eficient. Disposa de 6 velocitats, temporitzador, mando a distància i mode Winter-Summer per garantir el màxim confort durant tot l'any. El seu disseny Invisible White aporta una estètica neta i elegant a qualsevol espai, mentre que el sistema EnergySilence assegura un funcionament extremadament silenciós. Ideal per a qualsevol llar.
10	4	ABRILA TODOLAMPARA	https://m.media-amazon.com/images/I/31lTP0ic+aL._AC_.jpg	119.95	El Ventilador de Techo ABRILA TODOLAMPARA Escorpión combina potència i disseny modern amb el seu motor DC i aspas retràctiles. Amb llum LED integrada, ofereix una il·luminació eficient i una frescor agradable gràcies al seu funcionament silenciós. El disseny en blanc aporta una estètica elegant i minimalista, ideal per qualsevol ambient. Amb un diàmetre de 107 cm, aquest ventilador és perfecte per espais mitjans i grans, oferint un confort òptim durant tot l'any.
11	4	Cecotec Aero 460	https://m.media-amazon.com/images/I/411rZN1VdwL._AC_SX679_.jpg	89.99	El Ventilador de Techo Cecotec EnergySilence Aero 460 ofereix un rendiment silenciós i eficient amb el seu motor de 49 W i 3 velocitats ajustables. Amb un diàmetre de 106 cm i 3 aspes, garanteix una ventilació òptima en qualsevol espai. Incorpora llum LED integrada, temporitzador i funció Invierno per adaptar-se a totes les estacions de l'any. El seu disseny elegant en blanc i el mando a distància proporcionen un control còmode i modern, fent-lo perfecte per a qualsevol llar o oficina.
15	3	Samsung AR30 Malibu 9000 BTU	https://m.media-amazon.com/images/I/41JXoHwK7IL._AC_SL1500_.jpg	449.95	El Aire Acondicionado Samsung AR30 Malibu de 9000 BTU és ideal per mantenir la teva llar fresca i còmoda. Amb gas R32, més ecològic i eficient, i una classe d'eficiència energètica A++/A+, garanteix un baix consum. Aquest model monosplit ofereix un rendiment òptim, combinant potència i estalvi energètic. Perfecte per espais mitjans, assegura confort durant tot l'any amb una instal·lació fàcil i eficaç.
16	5	 Cecotec 5200 Aura Black	https://m.media-amazon.com/images/I/51pcFKaEI7L._AC_SL1000_.jpg	39.95	El Secador de Pelo Cecotec Bamba IoniCare 5200 Aura Black ofereix un gran caudal d'aire gràcies als seus 2300W de potència i motor DC. Amb ion real per eliminar l'encrespament i deixar el cabell suau, inclou concentrador i difusor per adaptar-se a diferents estils. Disposa de 2 velocitats i 3 temperatures per un resultat personalitzat. Perfecte per a un secat ràpid, professional i sense danys. Disseny elegant en negro.
17	5	Remington Profesional Silk	https://m.media-amazon.com/images/I/61UFiomlsbL._AC_SL1000_.jpg	59.95	El Secador de Pelo Remington Profesional Silk de 2400 W ofereix un motor AC de llarga durabilitat per a un secat ràpid i potent. Equipat amb rejilla de cerámica sedosa i tecnologia iònica, elimina l'encrespament i deixa el cabell suau i brillant. Inclou difusor i concentrador per a diferents acabats, amb 6 temperatures i 2 velocitats per adaptar-se a les teves necessitats. Ideal per a un estil professional a casa.
18	5	AIUNAOM 2400W	https://m.media-amazon.com/images/I/71Tdha+O+GL._AC_SX679_.jpg	29.99	El Secador de Pelo AIUNAOM Profesional 2400W ofereix un secado ràpid i constant amb tecnologia iònica per combatre l'encrespament. Amb botó de aire fred/calor i 3 velocitats, és ideal per a tot tipus de cabell. Inclou 2 concentradors i difusor per aconseguir diferents estils. Perfecte per a l'ús domèstic i també per portar de viatge, aquest secador combina potència, versatilitat i comoditat en un disseny compacte.
19	2	QijiefenCC	https://m.media-amazon.com/images/I/511i19SPkGL.__AC_SX300_SY300_QL70_ML2_.jpg	9.95	El Abanico de Mano Plegable QijiefenCC és ideal per afegir un toc divertit a qualsevol esdeveniment. Amb un disseny original i un missatge divertit, és perfecte per a fiestes, simposis o com a accessori únic. Fabricat en color negre, és lleuger i fàcil de portar. Un complement funcional i estilós per gaudir de l'estil i el confort en qualsevol moment.
20	2	Ventall Klimt El Beso	https://m.media-amazon.com/images/I/81qsGjE5X9L.__AC_SX300_SY300_QL70_ML2_.jpg	14.95	El Abanico Plegable en Tela Estampada està dissenyat amb una impressionant reproducció de l'obra "El Beso" de Klimt. Fabricat en cotó sobre fusta, aquest abanico combina funcionalitat i art. Perfecte per a esdeveniments o com a peça decorativa, aporta elegància i frescor amb un toc cultural únic. Ideal per amants de l'art i la moda.
21	2	Ventall LED PROM	https://m.media-amazon.com/images/I/71KfimUX-xL._AC_SX679_.jpg	12.95	El Abanico Plegable LED és l'accessori perfecte per a fiestes, festivals, discoteques i conciertos de música. Amb llums LED integrades, aporta un toc vibrant i original a qualsevol esdeveniment. De color groc, és lleuger i fàcil de portar, ideal per destacar en la foscor i afegir un toc de diversió i frescor a les teves nits més especials.
22	7	Molinet de Flors	https://m.media-amazon.com/images/I/71dTtY0UE5L._AC_SL1500_.jpg	6.95	Molinet de flors decoratiu perfecte per al jardí, terrassa o balcó. Amb el seu moviment giratori, afegeix un toc vibrant i alegre a l'entorn exterior, alhora que pot ajudar a mantenir allunyats els ocells.
14	3	Enfriador de Aire Midea	https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQMGiEA1fOq6aeBY2SULqE3BaECLle160awImkYi3RPxgl8orS-0cVF0_vmQKSvEcP-v3Yy29lR2Dh7Mj88KAgPC9prESJKilhnNHgooAUutDCJmG_s7MmkmzzQ5dNUk6rOwr4cdMZaLhjr&usqp=CAc	159.95	El Enfriador de Aire Midea 4 en 1 ofereix refrigeració, humidificació i ionització, tot en un sol dispositiu. Amb una capacitat de 5L d'aigua i un flux d'aire de 355 m³/h, proporciona un ambient fresc i agradable. Inclou control remot, 55W de potència i un disseny compacte en blanc. Perfecte per aquells que busquen una solució d'aire condicionat sense necessitat de manguera d'escape. Ideal per a espais petits i mitjans.
\.


--
-- Data for Name: usuari; Type: TABLE DATA; Schema: public; Owner: tdiw-f6
--

COPY public.usuari (id, mail, nom, direccio, poblacio, cp, contrasenya) FROM stdin;
13	padi@gmail.com	pado	pado	pado	1	$2y$10$eBDWMNpoQq.jtA9AfghLAeFaYGaHWXAqoYtD5WorWGkU00XxhsBxe
29	pedro@pedro.pedro	pedro	pedro	pedro	1	$2y$10$hb1yNhTFVSjHez194bcCoeC18LFM5pUIlo.vRsZUJd.vnEUXnDe1e
30	palindromo@gmail.com	palindromo	palindromo	palindromo	124	$2y$10$sJQ8qFXXxRuK4GZ3JzJDHOYgNZ4r9x9PHQPtRB4bKcRAm.nYzd/DG
32	pedrin@pedrin.pedrin	pedrin	pedrin	pedrin	21	$2y$10$Hm6rSfvG4UvkU2rJfErvAOuIeWqcr41q2.p7MK0j0cmZY2lucfZW2
33	patata@patata.patata	patata	patata	patata	1	$2y$10$eyKrlO/N.25xkguYEhJRwed/iKEdN6sjXyIp0KArhRKl/Qo0bczu6
1	pau@gmail.com	pau gasolio	pau	pau	1	$2y$10$E03s8jVBoS/O/hcKlrCjwufo41vtPE2CVGr8EbwggOl8zXn4.oQeu
36	jose@gmail.com	Jose	Granollers 24	Granollers	11111	$2y$10$es0ECpBwT2FkuBazycIWmu/D.el0wo9T7NOs9zdgempbea33cC2t6
39	test@test.com	test 	fhfgdh	ghth	12345	$2y$10$aYww7fAdDMWnd4xPZTCGherlJ4mknD.qracNmv3h2hKmk/5e.pvva
\.


--
-- Name: categoria_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tdiw-f6
--

SELECT pg_catalog.setval('public.categoria_id_seq', 7, true);


--
-- Name: comanda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tdiw-f6
--

SELECT pg_catalog.setval('public.comanda_id_seq', 35, true);


--
-- Name: comanda_producte_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tdiw-f6
--

SELECT pg_catalog.setval('public.comanda_producte_id_seq', 49, true);


--
-- Name: producte_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tdiw-f6
--

SELECT pg_catalog.setval('public.producte_id_seq', 3, true);


--
-- Name: usuari_id_seq; Type: SEQUENCE SET; Schema: public; Owner: tdiw-f6
--

SELECT pg_catalog.setval('public.usuari_id_seq', 39, true);


--
-- Name: categoria categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: tdiw-f6
--

ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT categoria_pkey PRIMARY KEY (id);


--
-- Name: comanda comanda_pkey; Type: CONSTRAINT; Schema: public; Owner: tdiw-f6
--

ALTER TABLE ONLY public.comanda
    ADD CONSTRAINT comanda_pkey PRIMARY KEY (id);


--
-- Name: comanda_producte comanda_producte_pkey; Type: CONSTRAINT; Schema: public; Owner: tdiw-f6
--

ALTER TABLE ONLY public.comanda_producte
    ADD CONSTRAINT comanda_producte_pkey PRIMARY KEY (id);


--
-- Name: producte producte_pkey; Type: CONSTRAINT; Schema: public; Owner: tdiw-f6
--

ALTER TABLE ONLY public.producte
    ADD CONSTRAINT producte_pkey PRIMARY KEY (id);


--
-- Name: usuari usuari_pkey; Type: CONSTRAINT; Schema: public; Owner: tdiw-f6
--

ALTER TABLE ONLY public.usuari
    ADD CONSTRAINT usuari_pkey PRIMARY KEY (id);


--
-- Name: comanda_producte comanda_producte_id_comanda_fkey; Type: FK CONSTRAINT; Schema: public; Owner: tdiw-f6
--

ALTER TABLE ONLY public.comanda_producte
    ADD CONSTRAINT comanda_producte_id_comanda_fkey FOREIGN KEY (id_comanda) REFERENCES public.comanda(id) ON DELETE CASCADE;


--
-- Name: comanda_producte comanda_producte_id_producte_fkey; Type: FK CONSTRAINT; Schema: public; Owner: tdiw-f6
--

ALTER TABLE ONLY public.comanda_producte
    ADD CONSTRAINT comanda_producte_id_producte_fkey FOREIGN KEY (id_producte) REFERENCES public.producte(id) ON DELETE CASCADE;


--
-- Name: producte fk_categoria_to_producte; Type: FK CONSTRAINT; Schema: public; Owner: tdiw-f6
--

ALTER TABLE ONLY public.producte
    ADD CONSTRAINT fk_categoria_to_producte FOREIGN KEY (id_categoria) REFERENCES public.categoria(id);


--
-- Name: comanda fk_usuari_to_comanda; Type: FK CONSTRAINT; Schema: public; Owner: tdiw-f6
--

ALTER TABLE ONLY public.comanda
    ADD CONSTRAINT fk_usuari_to_comanda FOREIGN KEY (id_usuari) REFERENCES public.usuari(id);


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: tdiw-professor
--

REVOKE ALL ON SCHEMA public FROM postgres;
REVOKE ALL ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO "tdiw-professor";
GRANT ALL ON SCHEMA public TO "tdiw-f6";


--
-- PostgreSQL database dump complete
--

