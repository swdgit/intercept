-- reference data base data
-- Styles of printing
insert into style (technology, wiki_link) values ('FDM', 'Fused Deposit Modeling', 'https://en.wikipedia.org/wiki/Fused_deposition_modeling');
insert into style (technology, wiki_link) values ('Robocating', 'Robocasting', 'https://en.wikipedia.org/wiki/Robocasting');
insert into style (technology, wiki_link) values ('SLA', 'Stereolithography', 'https://en.wikipedia.org/wiki/Stereolithography');
insert into style (technology, wiki_link) values ('DLP', 'Digital Light Processing', 'https://en.wikipedia.org/wiki/Digital_Light_Processing');
insert into style (technology, wiki_link) values ('SLS', 'Selective Laser Sintering', 'https://en.wikipedia.org/wiki/Selective_laser_sintering');

-- 

INSERT INTO printer (supplier_id, style_id, name) VALUES ('1', '1', 'LulzBot Mini');
INSERT INTO printer (supplier_id, style_id, name) VALUES ('1', '1', 'LulzBot TAZ 5');

commit;

insert into material (type, description) values ('PLA', 'Polylactic acid');
insert into material (type, description) values ('ABS', 'Acrylonitrile butadiene styrene');
insert into material (type, description) values ('HIPS', 'High Impact Polystyrene');


INSERT INTO printer_material_xref (printer_id, material_id) VALUES (1, 1);
INSERT INTO printer_material_xref (printer_id, material_id) VALUES (1, 2);
INSERT INTO printer_material_xref (printer_id, material_id) VALUES (1, 3);
INSERT INTO printer_material_xref (printer_id, material_id) VALUES (2, 1);
INSERT INTO printer_material_xref (printer_id, material_id) VALUES (2, 2);
INSERT INTO printer_material_xref (printer_id, material_id) VALUES (2, 3);
