 $(document).ready(function () {

                 var perfil = $('#perfil').html();
                 var update = "";
                 var deletar = "";
                 $(".jtable-command-column .jtable-edit-command-button").click(function(){

                       console.log("to");

                });

                    //Prepare jTable
                        $('#PeopleTableContainer').jtable({
                                title: 'Informações acadêmicas',
                                sorting: true,
                                paging: true,
                                pageSize: 30,
                                defaultSorting: 'nome ASC', //Campo de la base de datos que se tomara para ordenar
                                actions: {
                                        listAction: 'consultas/oferta.php?action=list',
                                        createAction: null,
                                        updateAction: null,
                                        deleteAction: null
                                },
                                fields: {
                                        email: {
                            title: '',
                            width: '1%',
                            sorting: false,
                            edit: false,
                            create: false,
                            display: function (studentData) {
                                //Create an image that will be used to open child table
                                var $img = $('<center><img style="cursor:pointer;" src="img/contatos.png" title="Dados pessoais" /></center>');





                                //Open child table when user clicks the image
                                $img.click(function () {

                                    //Filtrar perfil: será jogado numa variável que indicará a ação de listagem
                                if(perfil == 1 || perfil == 3){
                                    update = 'consultas/userdocs.php?action=update&cpf_user=' + studentData.record.cpf;
                                    deletar = 'consultas/userdocs.php?action=delete&cpf_user=' + studentData.record.cpf;
                                    console.log('Userdocs');
                                }else{
                                    update = null;

                                }

                                    $('#PeopleTableContainer').jtable('openChildTable',
                                            $img.closest('tr'),
                                            {
                                                title:  '<img style="cursor:pointer;" src="img/contatos.png" title="Dados pessoais" />  Dados pessoais: '+studentData.record.nome,
                                                actions: {
                                                    listAction: 'consultas/userdocs.php?action=list&id=' + studentData.record.cpf,
                                                    deleteAction: deletar,
                                                    updateAction: 'consultas/userdocs.php?action=update&cpf_user=' + studentData.record.cpf,
                                                    createAction: null
                                                },
                                                fields: {
                                                    id: {

                                                         title: 'ID',
                                                         list: false,
                                                         type: 'hidden',
                                                         defaultValue: studentData.record.id
                                                    },
                                                    nome: {
                                                        title: 'Nome completo',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    cpf: {
                                                        title: 'CPF',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    telefone: {
                                                        title: 'Telefone',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: true
                                                    },
                                                    email: {
                                                        title: 'E-mail',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: true
                                                    },
                                                    uf_atuacao: {
                                                        title: 'UF atuação',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                     rg: {
                                                        title: 'RG',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    nome_instituicao: {
                                                        title: 'Nome instituição',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    municipio_atuacao: {
                                                        title: 'Município',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: true
                                                    },
                                                    conselho: {
                                                        title: 'Conselho',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    num_conselho: {
                                                        title: 'Número conselho',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    uf_conselho: {
                                                        title: 'UF conselho',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    graduacao: {
                                                        title: 'Graduação',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    ano_graduacao: {
                                                        title: 'Ano graduação',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    dsei: {
                                                        title: 'Dsei',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    situacao_edicao: {
                                                        title: 'Situação edição',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    data_situacao: {
                                                        title: 'Data situação',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    ciclo: {
                                                        title: 'Ciclo',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    etapa: {
                                                        title: 'Etapa',
                                                        key: true,
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    }


                                                }
                                            }, function (data) { //opened handler
                                                data.childTable.jtable('load');
                                            });
                                });
                                //Return image to show on the person row
                                return $img;
                            }
                        },
                        seila: {
                            title: '',
                            width: '1%',
                            sorting: false,
                            edit: false,
                            create: false,
                            display: function (studentData) {
                                //Create an image that will be used to open child table
                                var $img = $('<center><span style="font-size: 16px; cursor: pointer;" class="glyphicon glyphicon-folder-open" aria-hidden="true" title="Dados profissionais e do programa"></span></center>');



                                //Open child table when user clicks the image
                                $img.click(function () {

                                    //Filtrar perfil: será jogado numa variável que indicará a ação de listagem
                                if(perfil == 1 || perfil == 3){
                                    update = 'consultas/useroferta.php?action=update&cpf_user=' + studentData.record.cpf;
                                    deletar = 'consultas/useroferta.php?action=delete&cpf_user=' + studentData.record.cpf;
                                    console.log('Useroferta');

                                }else{
                                    update = null;
                                }

                                    $('#PeopleTableContainer').jtable('openChildTable',
                                            $img.closest('tr'),
                                            {
                                                title:  '<span style="font-size: 16px; cursor: pointer; margin-right: 5px;" class="glyphicon glyphicon-folder-open" aria-hidden="true" title="Dados profissionais e do programa"></span> Dados profissionais e do programa: '+studentData.record.nome,
                                                actions: {
                                                    listAction: 'consultas/useroferta.php?action=list&id=' + studentData.record.cpf,
                                                    deleteAction: deletar,
                                                    updateAction: update,
                                                    createAction: null
                                                },
                                                fields: {
                                                    id_user_docs: {
                                                         key: true,
                                                         type: 'hidden',
                                                         defaultValue: studentData.record.id
                                                    },
                                                    uf: {
                                                        title: 'UF',
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    programa: {
                                                        title: 'Programa',
                                                        create: false,
                                                        edit: true,
                                                        list: true
                                                    },
                                                    ciclo: {
                                                        title: 'Ciclo',
                                                        create: false,
                                                        edit: true,
                                                        list: true
                                                    },
                                                    conselho: {
                                                        title: 'Profissão',
                                                        create: false,
                                                        edit: true,
                                                        list: true
                                                    },
                                                    nome_instituicao: {
                                                        title: 'Instituição supervisora',
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    municipio_lotacao: {
                                                        title: 'Município de lotação',
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    status_curso: {
                                                        title: 'Status no curso',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    cpf: {
                                                        title: 'CPF',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    apto_tcc: {
                                                        title: 'Apto para TCC',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    orientador: {
                                                        title: 'Nome do orientador',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    recuperacao: {
                                                        title: 'Recuperação',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    disciplinas: {
                                                        title: 'Disciplinas',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    local_tcc: {
                                                        title: 'Local apresentação do TCC',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    polo_propesq: {
                                                        title: 'Polo Propesq',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    status_propesq: {
                                                        title: 'Status propesq',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                     obs: {
                                                        title: 'Observação',
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    identidade: {
                                                        title: 'Documento de identidade',
                                                        create: false,
                                                        edit: true,
                                                        list: false
                                                    },
                                                    obs2: {
                                                        title: 'Observação',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    emissor: {
                                                        title: 'Emissor',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    data_nasc: {
                                                        title: 'Data nascimento',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    mae: {
                                                        title: 'Nome da mãe',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    pai: {
                                                        title: 'Nome do pai',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    naturalidade: {
                                                        title: 'Naturalidade',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    nacionalidade: {
                                                        title: 'Nacionalidade',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    diploma: {
                                                        title: 'Diploma',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    titulacao_orientador: {
                                                        title: 'Titulação orientador',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    ficha_matricula: {
                                                        title: 'Ficha de matrícula',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    dataingresso: {
                                                        title: 'Data de ingresso',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    dataalteracao: {
                                                        title: 'Data alteração',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    datadesligamento: {
                                                        title: 'Data desligamento',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    },
                                                    recesso: {
                                                        title: 'Recesso',
                                                        create: false,
                                                        edit: false,
                                                        list: false
                                                    }

                                                }
                                            }, function (data) { //opened handler
                                                data.childTable.jtable('load');
                                            });
                                });
                                //Return image to show on the person row
                                return $img;
                            }
                        },
                        notas: {
                            title: '',
                            width: '1%',
                            sorting: false,
                            edit: false,
                            create: false,
                            display: function (studentData) {
                                //Create an image that will be used to open child table

                                // <img style="cursor:pointer;" src="img/notas_disciplina.png" title="Notas Disciplina" />
                                var $img = $('<center><img style="cursor:pointer;" src="img/dados_academico.png" title="Dados do curso" /></center>');



                                //Open child table when user clicks the image
                                $img.click(function () {

                                     //Filtrar perfil: será jogado numa variável que indicará a ação de listagem
                                if(perfil == 1 || perfil == 3){
                                    update = 'consultas/notasDisciplina.php?action=update&cpf_user=' + studentData.record.cpf;
                                    deletar = 'consultas/notasDisciplina.php?action=delete&cpf_user=' + studentData.record.cpf;

                                    console.log('notasDisciplina');
                                }else{
                                    update = null;
                                }

                                    $('#PeopleTableContainer').jtable('openChildTable',
                                            $img.closest('tr'),
                                            {
                                                title:  '<img style="cursor:pointer;" src="img/dados_academico.png" title="Dados do curso" /> Dados do curso: '+studentData.record.nome,
                                                actions: {
                                                    listAction: 'consultas/notasDisciplina.php?action=list&id=' + studentData.record.cpf+'&category='+studentData.record.categoryid + '&user='+studentData.record.idmoodle,
                                                    deleteAction: null,
                                                    updateAction: update,
                                                    createAction: null
                                                },
                                                fields: {
                                                    userid: {
                                                         key: true,
                                                         type: 'hidden',
                                                         defaultValue: studentData.record.id
                                                    },
                                                    status_no_cursos: {
                                                        title: 'Status no curso',
                                                        create: false,
                                                        edit: true,
                                                        list: true
                                                    },
                                                    situacao_aluno: {
                                                        title: 'Situação do aluno',
                                                        create: false,
                                                        edit: true,
                                                        list: true
                                                    },
                                                    frequencia: {
                                                        title: 'Frequência curso',
                                                        create: false,
                                                        edit: true,
                                                        list: true
                                                    },
                                                    status_propesq: {
                                                        title: 'Situação matrícula na Propesq',
                                                        create: false,
                                                        edit: true,
                                                        list: true
                                                    },
                                                    local_tcc: {
                                                        title: 'Local para apresentação do TCC',
                                                        create: false,
                                                        edit: true,
                                                        list: true
                                                    },
                                                    apto_tcc: {
                                                        title: 'Apto para apresentar TCC?',
                                                        create: false,
                                                        edit: true,
                                                        list: true
                                                    },
                                                    orientador: {
                                                        title: 'Nome do orientador',
                                                        create: false,
                                                        edit: false,
                                                        list: true
                                                    },
                                                    coursename: {
                                                        title: 'Disciplina',
                                                        create: false,
                                                        edit: false, //informações do moodle
                                                        list: true
                                                    },
                                                    finalgrade: {
                                                        title: 'Média final',
                                                        create: false,
                                                        edit: false,
                                                        list: true
                                            },
                                            eixo1: {
                                                        title: 'Recuperação no eixo 1?',
                                                        create: false,
                                                        edit: false, //NAO PDOE ALTERAR. VALOR BOOLEANO VINDO DA CONSULTA AO BANCO
                                                        list: true
                                            },
                                            eixo2: {
                                                        title: 'Recuperação no eixo 2?',
                                                        create: false,
                                                        edit: false, //NAO PDOE ALTERAR. VALOR BOOLEANO VINDO DA CONSULTA AO BANCO
                                                        list: true
                                            }

                                                }
                                            }, function (data) { //opened handler
                                                data.childTable.jtable('load');
                                            });
                                 });
                                //Return image to show on the person row
                                return $img;
                            }
                        },

                         grupos: {
                            title: '',
                            width: '1%',
                            sorting: false,
                            edit: false,
                            create: false,
                            display: function (studentData) {
                                //Create an image that will be used to open child table

                               var $img = $('<center><img style="cursor:pointer;" src="img/grupo.png" title="Dados do AVA" /></center>');



                                //Open child table when user clicks the image
                                $img.click(function () {

                                    //Filtrar perfil: será jogado numa variável que indicará a ação de listagem
                                if(perfil == 1 || perfil == 3){
                                    update = 'consultas/grupos.php?action=update&ciclo=' + studentData.record.ciclo;
                                     console.log('grupos');
                                }else{
                                    update = null;
                                }

                                    $('#PeopleTableContainer').jtable('openChildTable',
                                            $img.closest('tr'),
                                            {
                                                title:  '<img style="cursor:pointer;cursor: pointer;width: 20px;margin-bottom: 5px;" src="img/grupo.png" title="Dados do AVA" />   Dados do AVA: '+studentData.record.nome,
                                                actions: {
                                                    listAction: 'consultas/grupos.php?action=list&id=' + studentData.record.cpf+'&category='+studentData.record.categoryid + '&user='+studentData.record.idmoodle + '&groupid='+studentData.record.id,
                                                    deleteAction: null,
                                                    updateAction: update,
                                                    createAction: null
                                                },
                                                fields: {
                                                    groupid: {
                                                        title: 'Id do grupo',
                                                         key: true,
                                                         list: false,
                                                         defaultValue: studentData.record.id
                                                    },
                                                    groupname: {
                                                        title: 'Nome grupo',
                                                        create: false,
                                                        edit: true,
                                                        list: true
                                                    },
                                                    courseid: {
                                                        title: 'Tutor',
                                                        create: false,
                                                        edit: true,
                                                        list: true
                                                    }

                                                }
                                            }, function (data) { //opened handler
                                                data.childTable.jtable('load');
                                            });
                                 });
                                //Return image to show on the person row
                                return $img;
                            }
                        },

                                        idmoodle: {
                                                key: true,
                                                list: false,
                                                title:'id do moodle',


                                        },
                                        nome: {
                                                title:'Nome completo'

                                        },
                                        cpf: {
                                                title:'CPF'

                                        },

                                        uf_atuacao: {
                                            title:'UF',
                                            list: true
                                        },
                                        nomeoferta: {
                                                title:'Oferta',
                                                list: true,
                                                edit: true

                                        },

                                        categoryid: {
                                            title: 'Categoria',
                                            list: false,
                                            edit: true
                                        }

                                }
                        });




 });


