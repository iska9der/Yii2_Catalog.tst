--
-- PostgreSQL database dump
--

-- Dumped from database version 12.4
-- Dumped by pg_dump version 12.4

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

--
-- Name: catalog; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA catalog;


ALTER SCHEMA catalog OWNER TO postgres;

--
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: category; Type: TABLE; Schema: catalog; Owner: postgres
--

CREATE TABLE catalog.category (
    category_id integer NOT NULL,
    pic text,
    name character varying(100) NOT NULL
);


ALTER TABLE catalog.category OWNER TO postgres;

--
-- Name: Category_id_seq; Type: SEQUENCE; Schema: catalog; Owner: postgres
--

CREATE SEQUENCE catalog."Category_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE catalog."Category_id_seq" OWNER TO postgres;

--
-- Name: Category_id_seq; Type: SEQUENCE OWNED BY; Schema: catalog; Owner: postgres
--

ALTER SEQUENCE catalog."Category_id_seq" OWNED BY catalog.category.category_id;


--
-- Name: eav_attribute; Type: TABLE; Schema: catalog; Owner: postgres
--

CREATE TABLE catalog.eav_attribute (
    id integer NOT NULL,
    "entityId" integer DEFAULT 0,
    "typeId" integer DEFAULT 0,
    type character varying(50) DEFAULT ''::character varying,
    name character varying(255) DEFAULT 'NULL'::character varying,
    label character varying(255) DEFAULT 'NULL'::character varying,
    "defaultValue" character varying(255) DEFAULT 'NULL'::character varying,
    "defaultOptionId" integer,
    description character varying(255) DEFAULT ''::character varying,
    "order" integer DEFAULT 0,
    required smallint DEFAULT 1
);


ALTER TABLE catalog.eav_attribute OWNER TO postgres;

--
-- Name: eav_attribute_id_seq; Type: SEQUENCE; Schema: catalog; Owner: postgres
--

CREATE SEQUENCE catalog.eav_attribute_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE catalog.eav_attribute_id_seq OWNER TO postgres;

--
-- Name: eav_attribute_id_seq; Type: SEQUENCE OWNED BY; Schema: catalog; Owner: postgres
--

ALTER SEQUENCE catalog.eav_attribute_id_seq OWNED BY catalog.eav_attribute.id;


--
-- Name: eav_attribute_option; Type: TABLE; Schema: catalog; Owner: postgres
--

CREATE TABLE catalog.eav_attribute_option (
    id integer NOT NULL,
    "attributeId" integer DEFAULT 0,
    value character varying(255) DEFAULT 'NULL'::character varying,
    "defaultOptionId" smallint DEFAULT 0,
    "order" integer DEFAULT 0
);


ALTER TABLE catalog.eav_attribute_option OWNER TO postgres;

--
-- Name: eav_attribute_option_id_seq; Type: SEQUENCE; Schema: catalog; Owner: postgres
--

CREATE SEQUENCE catalog.eav_attribute_option_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE catalog.eav_attribute_option_id_seq OWNER TO postgres;

--
-- Name: eav_attribute_option_id_seq; Type: SEQUENCE OWNED BY; Schema: catalog; Owner: postgres
--

ALTER SEQUENCE catalog.eav_attribute_option_id_seq OWNED BY catalog.eav_attribute_option.id;


--
-- Name: eav_attribute_rules; Type: TABLE; Schema: catalog; Owner: postgres
--

CREATE TABLE catalog.eav_attribute_rules (
    id integer NOT NULL,
    "attributeId" integer DEFAULT 0,
    rules text DEFAULT ''::text,
    required smallint DEFAULT 0,
    visible smallint DEFAULT 0,
    locked smallint DEFAULT 0
);


ALTER TABLE catalog.eav_attribute_rules OWNER TO postgres;

--
-- Name: eav_attribute_rules_id_seq; Type: SEQUENCE; Schema: catalog; Owner: postgres
--

CREATE SEQUENCE catalog.eav_attribute_rules_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE catalog.eav_attribute_rules_id_seq OWNER TO postgres;

--
-- Name: eav_attribute_rules_id_seq; Type: SEQUENCE OWNED BY; Schema: catalog; Owner: postgres
--

ALTER SEQUENCE catalog.eav_attribute_rules_id_seq OWNED BY catalog.eav_attribute_rules.id;


--
-- Name: eav_attribute_type; Type: TABLE; Schema: catalog; Owner: postgres
--

CREATE TABLE catalog.eav_attribute_type (
    id integer NOT NULL,
    name character varying(255) DEFAULT 'NULL'::character varying,
    "handlerClass" character varying(255) DEFAULT 'NULL'::character varying,
    "storeType" smallint DEFAULT 0
);


ALTER TABLE catalog.eav_attribute_type OWNER TO postgres;

--
-- Name: eav_attribute_type_id_seq; Type: SEQUENCE; Schema: catalog; Owner: postgres
--

CREATE SEQUENCE catalog.eav_attribute_type_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE catalog.eav_attribute_type_id_seq OWNER TO postgres;

--
-- Name: eav_attribute_type_id_seq; Type: SEQUENCE OWNED BY; Schema: catalog; Owner: postgres
--

ALTER SEQUENCE catalog.eav_attribute_type_id_seq OWNED BY catalog.eav_attribute_type.id;


--
-- Name: eav_attribute_value; Type: TABLE; Schema: catalog; Owner: postgres
--

CREATE TABLE catalog.eav_attribute_value (
    id integer NOT NULL,
    "entityId" integer DEFAULT 0,
    "attributeId" integer DEFAULT 0,
    value text,
    "optionId" integer DEFAULT 0
);


ALTER TABLE catalog.eav_attribute_value OWNER TO postgres;

--
-- Name: eav_attribute_value_id_seq; Type: SEQUENCE; Schema: catalog; Owner: postgres
--

CREATE SEQUENCE catalog.eav_attribute_value_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE catalog.eav_attribute_value_id_seq OWNER TO postgres;

--
-- Name: eav_attribute_value_id_seq; Type: SEQUENCE OWNED BY; Schema: catalog; Owner: postgres
--

ALTER SEQUENCE catalog.eav_attribute_value_id_seq OWNED BY catalog.eav_attribute_value.id;


--
-- Name: eav_entity; Type: TABLE; Schema: catalog; Owner: postgres
--

CREATE TABLE catalog.eav_entity (
    id integer NOT NULL,
    "entityName" character varying(50),
    "entityModel" character varying(100),
    "categoryId" integer
);


ALTER TABLE catalog.eav_entity OWNER TO postgres;

--
-- Name: eav_entity_id_seq; Type: SEQUENCE; Schema: catalog; Owner: postgres
--

CREATE SEQUENCE catalog.eav_entity_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE catalog.eav_entity_id_seq OWNER TO postgres;

--
-- Name: eav_entity_id_seq; Type: SEQUENCE OWNED BY; Schema: catalog; Owner: postgres
--

ALTER SEQUENCE catalog.eav_entity_id_seq OWNED BY catalog.eav_entity.id;


--
-- Name: product; Type: TABLE; Schema: catalog; Owner: postgres
--

CREATE TABLE catalog.product (
    product_id integer NOT NULL,
    name character varying(100) NOT NULL,
    pic text,
    description text NOT NULL,
    qrcode text,
    category_id integer,
    price integer
);


ALTER TABLE catalog.product OWNER TO postgres;

--
-- Name: product_id_seq; Type: SEQUENCE; Schema: catalog; Owner: postgres
--

CREATE SEQUENCE catalog.product_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE catalog.product_id_seq OWNER TO postgres;

--
-- Name: product_id_seq; Type: SEQUENCE OWNED BY; Schema: catalog; Owner: postgres
--

ALTER SEQUENCE catalog.product_id_seq OWNED BY catalog.product.product_id;


--
-- Name: migration; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migration (
    version character varying(180) NOT NULL,
    apply_time integer
);


ALTER TABLE public.migration OWNER TO postgres;

--
-- Name: category category_id; Type: DEFAULT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.category ALTER COLUMN category_id SET DEFAULT nextval('catalog."Category_id_seq"'::regclass);


--
-- Name: eav_attribute id; Type: DEFAULT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute ALTER COLUMN id SET DEFAULT nextval('catalog.eav_attribute_id_seq'::regclass);


--
-- Name: eav_attribute_option id; Type: DEFAULT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute_option ALTER COLUMN id SET DEFAULT nextval('catalog.eav_attribute_option_id_seq'::regclass);


--
-- Name: eav_attribute_rules id; Type: DEFAULT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute_rules ALTER COLUMN id SET DEFAULT nextval('catalog.eav_attribute_rules_id_seq'::regclass);


--
-- Name: eav_attribute_type id; Type: DEFAULT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute_type ALTER COLUMN id SET DEFAULT nextval('catalog.eav_attribute_type_id_seq'::regclass);


--
-- Name: eav_attribute_value id; Type: DEFAULT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute_value ALTER COLUMN id SET DEFAULT nextval('catalog.eav_attribute_value_id_seq'::regclass);


--
-- Name: eav_entity id; Type: DEFAULT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_entity ALTER COLUMN id SET DEFAULT nextval('catalog.eav_entity_id_seq'::regclass);


--
-- Name: product product_id; Type: DEFAULT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.product ALTER COLUMN product_id SET DEFAULT nextval('catalog.product_id_seq'::regclass);


--
-- Name: category category_pkey; Type: CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.category
    ADD CONSTRAINT category_pkey PRIMARY KEY (category_id);


--
-- Name: eav_attribute_option eav_attribute_option_pkey; Type: CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute_option
    ADD CONSTRAINT eav_attribute_option_pkey PRIMARY KEY (id);


--
-- Name: eav_attribute eav_attribute_pkey; Type: CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute
    ADD CONSTRAINT eav_attribute_pkey PRIMARY KEY (id);


--
-- Name: eav_attribute_rules eav_attribute_rules_pkey; Type: CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute_rules
    ADD CONSTRAINT eav_attribute_rules_pkey PRIMARY KEY (id);


--
-- Name: eav_attribute_type eav_attribute_type_pkey; Type: CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute_type
    ADD CONSTRAINT eav_attribute_type_pkey PRIMARY KEY (id);


--
-- Name: eav_attribute_value eav_attribute_value_pkey; Type: CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute_value
    ADD CONSTRAINT eav_attribute_value_pkey PRIMARY KEY (id);


--
-- Name: eav_entity eav_entity_pkey; Type: CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_entity
    ADD CONSTRAINT eav_entity_pkey PRIMARY KEY (id);


--
-- Name: product product_pkey; Type: CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.product
    ADD CONSTRAINT product_pkey PRIMARY KEY (product_id);


--
-- Name: migration migration_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migration
    ADD CONSTRAINT migration_pkey PRIMARY KEY (version);


--
-- Name: idx_eav_attribute_value_entityId; Type: INDEX; Schema: catalog; Owner: postgres
--

CREATE INDEX "idx_eav_attribute_value_entityId" ON catalog.eav_attribute_value USING btree ("entityId");


--
-- Name: eav_attribute FKDefOptId_Option_ID; Type: FK CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute
    ADD CONSTRAINT "FKDefOptId_Option_ID" FOREIGN KEY ("defaultOptionId") REFERENCES catalog.eav_attribute_option(id) ON DELETE CASCADE;


--
-- Name: eav_attribute FK_Attribute_typeId; Type: FK CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute
    ADD CONSTRAINT "FK_Attribute_typeId" FOREIGN KEY ("typeId") REFERENCES catalog.eav_attribute_type(id) ON DELETE CASCADE;


--
-- Name: eav_attribute FK_EntityId; Type: FK CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute
    ADD CONSTRAINT "FK_EntityId" FOREIGN KEY ("entityId") REFERENCES catalog.eav_entity(id) ON DELETE CASCADE;


--
-- Name: eav_attribute_value FK_OptionID_Option_id; Type: FK CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute_value
    ADD CONSTRAINT "FK_OptionID_Option_id" FOREIGN KEY ("optionId") REFERENCES catalog.eav_attribute_option(id) ON DELETE CASCADE;


--
-- Name: eav_attribute_option FK_Option_attributeId; Type: FK CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute_option
    ADD CONSTRAINT "FK_Option_attributeId" FOREIGN KEY ("attributeId") REFERENCES catalog.eav_attribute(id) ON DELETE CASCADE;


--
-- Name: eav_attribute_rules FK_Rules_attributeId; Type: FK CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute_rules
    ADD CONSTRAINT "FK_Rules_attributeId" FOREIGN KEY ("attributeId") REFERENCES catalog.eav_attribute(id) ON DELETE CASCADE;


--
-- Name: eav_attribute_value FK_Value_attributeId; Type: FK CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.eav_attribute_value
    ADD CONSTRAINT "FK_Value_attributeId" FOREIGN KEY ("attributeId") REFERENCES catalog.eav_attribute(id) ON DELETE CASCADE;


--
-- Name: product product_category_id_fkey; Type: FK CONSTRAINT; Schema: catalog; Owner: postgres
--

ALTER TABLE ONLY catalog.product
    ADD CONSTRAINT product_category_id_fkey FOREIGN KEY (category_id) REFERENCES catalog.category(category_id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

