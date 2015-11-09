-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2015-10-05 14:13:37.036




-- tables
-- Table histories
CREATE TABLE histories (
    id int  NOT NULL  AUTO_INCREMENT,
    history text  NOT NULL,
    CONSTRAINT histories_pk PRIMARY KEY (id)
);

-- Table history_to_tag
CREATE TABLE history_to_tag (
    id int  NOT NULL  AUTO_INCREMENT,
    id_tag int  NOT NULL,
    id_history int  NOT NULL,
    CONSTRAINT history_to_tag_pk PRIMARY KEY (id)
);

-- Table tag_aliases
CREATE TABLE tag_aliases (
    id int  NOT NULL  AUTO_INCREMENT,
    id_tag int  NOT NULL,
    tag_alias varchar(255)  NOT NULL,
    CONSTRAINT tag_aliases_pk PRIMARY KEY (id)
);

-- Table tags
CREATE TABLE tags (
    id int  NOT NULL  AUTO_INCREMENT,
    name varchar(255)  NOT NULL,
    tag_aliases_id int  NOT NULL,
    CONSTRAINT tags_pk PRIMARY KEY (id)
);





-- foreign keys
-- Reference:  histories_history_to_tag (table: histories)


ALTER TABLE histories ADD CONSTRAINT histories_history_to_tag FOREIGN KEY histories_history_to_tag ()
    REFERENCES history_to_tag ();
-- Reference:  tags_history_to_tag (table: tags)


ALTER TABLE tags ADD CONSTRAINT tags_history_to_tag FOREIGN KEY tags_history_to_tag ()
    REFERENCES history_to_tag ();
-- Reference:  tags_tag_aliases (table: tags)


ALTER TABLE tags ADD CONSTRAINT tags_tag_aliases FOREIGN KEY tags_tag_aliases (tag_aliases_id)
    REFERENCES tag_aliases (id);



-- End of file.

