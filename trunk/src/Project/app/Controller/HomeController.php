<?php
/*
 * Created on 24/12/2012
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 class HomeController extends AppController{
       public function index ($id = null) {
                                
                           if(($this->request->is('post')) and (isset($this->request->data['Project']['id']))){
                                $id = $this->request->data['Project']['id'];
                }
               $this->layout =  'main';
                           $this-> set ('tipo_usuario',$this->Auth->user('type'));                                      
                           $this-> set ('nome_usuario',$this->Auth->user('username'));          
                            $this -> set ('projects', $this-> Home -> Project->find('all', array('conditions'=> array('Project.removed !=' => 1),'order'=>array('Project.name'))));                     
                                if($id == null){
                                        $this -> set ('projectsPais', $this-> Home -> Project->find('all', array('conditions'=> array('Project.removed !=' => 1, 'Project.parent_project_id =' => null))));
                                }
                                else{
                                        $this -> set ('projectsPais', $this-> Home -> Project->find('all', array('conditions'=> array('Project.id'=>$id,'Project.removed !=' => 1))));
                                }
                                $this -> set ('projectsFilhos', $this-> Home -> Project->find('all', array('conditions'=> array('Project.removed !=' => 1, 'Project.parent_project_id !=' => null))));
                                $this -> set ('projectsNetos', $this-> Home -> Project->find('all', array('conditions'=> array('Project.removed !=' => 1, 'Project.parent_project_id !=' => null))));
                                if ($this -> request -> is('post')) {
                                        if (array_key_exists('date_submit', $_POST)) {
                                                $date =  $_POST['date_submit'];
                                                $this -> set('date_submit', $date);
                                        }
                                }
								$arrayConsultor1 = array();
								$arrayConsultor2 = array();
								$arrayConsultor3 = array();
								$arrayConsultor4 = array();
                                //Tuplas da posicao do consultor 1
                               $consultor1PadraoId = $this->Home->Activity->query('select activities.project_id, activities.start_hours, activities.end_hours, activities.start_date, activities.end_date, activities.description, consultants.name, consultants.acronym, consultants.acronym_color from consultants, activities where activities.status = "Planejada" and activities.consultant1_id = consultants.id and activities.removed != 1 and activities.consultant1_id is not null');                      
                                                       
                                foreach ($consultor1PadraoId as $consultor1) {
                                     if(($consultor1['activities']['start_date'])==($consultor1['activities']['end_date'])){
                                        if ($consultor1['activities']['start_hours'] < '12:00:00'){
                                                $mt = 'M';
                                                $padraoID = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['start_date'].'.'.'1';
												$padraoID2 = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['start_date'].'.'.'2';
												$padraoID3 = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['start_date'].'.'.'3';
												$padraoID4 = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['start_date'].'.'.'4';
												$arrayConsultor2[$padraoID2]=array('','White','');
												$arrayConsultor3[$padraoID3]=array('','White','');
												$arrayConsultor4[$padraoID4]=array('','White','');
                                                $descricao = $consultor1['activities']['description'];
                                                $sigla = $consultor1['consultants']['acronym'];
                                                $cor = $consultor1['consultants']['acronym_color'];
                                                

                                                if (!(array_key_exists($padraoID, $arrayConsultor1))){  
                                                    $arrayConsultor1[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                   if (($arrayConsultor1[$padraoID][1]) <> '#808080'){                                                 
                                                   $arrayConsultor1[$padraoID][0] = 2; 
                                                   $arrayConsultor1[$padraoID][1] = '#808080';
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao;
                                               }
                                                   else{                                                   
                                                   $arrayConsultor1[$padraoID][0] = $arrayConsultor1[$padraoID][0] + 1;
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao; 
                                                   }                                                 
                                        }}
                                        if ($consultor1['activities']['end_hours'] > '12:00:00'){
                                                $mt = 'T';
                                                $padraoID = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['start_date'].'.'.'1';
												$padraoID2 = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['start_date'].'.'.'2';
												$padraoID3 = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['start_date'].'.'.'3';
												$padraoID4 = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['start_date'].'.'.'4';
												$arrayConsultor2[$padraoID2]=array('','White','');
												$arrayConsultor3[$padraoID3]=array('','White','');
												$arrayConsultor4[$padraoID4]=array('','White','');
                                                $descricao = $consultor1['activities']['description'];
                                                $sigla = $consultor1['consultants']['acronym'];
                                                $cor = $consultor1['consultants']['acronym_color'];
                                               if (!(array_key_exists($padraoID, $arrayConsultor1))){  
                                                    $arrayConsultor1[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                   if (($arrayConsultor1[$padraoID][1]) <> '#808080'){                                                 
                                                   $arrayConsultor1[$padraoID][0] = 2; 
                                                   $arrayConsultor1[$padraoID][1] = '#808080';
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao;
                                               }
                                                   else{                                                   
                                                   $arrayConsultor1[$padraoID][0] = $arrayConsultor1[$padraoID][0] + 1;
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao; 
                                                   }                                                 
                                            }
                                          }                                                                 
                                    }elseif(((strtotime($consultor1['activities']['end_date'])-strtotime($consultor1['activities']['start_date']))/86400) == 1){
                                            
                                                if ($consultor1['activities']['start_hours'] < '12:00:00'){
                                                $mt = 'M';
                                                $padraoID = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['start_date'].'.'.'1';
												$padraoID2 = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['start_date'].'.'.'2';
												$padraoID3 = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['start_date'].'.'.'3';
												$padraoID4 = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['start_date'].'.'.'4';
												$arrayConsultor2[$padraoID2]=array('','White','');
												$arrayConsultor3[$padraoID3]=array('','White','');
												$arrayConsultor4[$padraoID4]=array('','White','');
                                                $descricao = $consultor1['activities']['description'];
                                                $sigla = $consultor1['consultants']['acronym'];
                                                $cor = $consultor1['consultants']['acronym_color'];
                                                if (!(array_key_exists($padraoID, $arrayConsultor1))){  
                                                    $arrayConsultor1[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                   if (($arrayConsultor1[$padraoID][1]) <> '#808080'){                                                 
                                                   $arrayConsultor1[$padraoID][0] = 2; 
                                                   $arrayConsultor1[$padraoID][1] = '#808080';
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao;
												   
                                               }
                                                   else{                                                   
                                                   $arrayConsultor1[$padraoID][0] = $arrayConsultor1[$padraoID][0] + 1;
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao; 
                                                   }                                                 
                                                 }
                                                
                                                }
                                                
                                                $mt = 'T';
                                                $padraoID = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['start_date'].'.'.'1';
												$padraoID2 = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['start_date'].'.'.'2';
												$padraoID3 = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['start_date'].'.'.'3';
												$padraoID4 = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['start_date'].'.'.'4';
												$arrayConsultor2[$padraoID2]=array('','White','');
												$arrayConsultor3[$padraoID3]=array('','White','');
												$arrayConsultor4[$padraoID4]=array('','White','');
                                                $descricao = $consultor1['activities']['description'];
                                                $sigla = $consultor1['consultants']['acronym'];
                                                $cor = $consultor1['consultants']['acronym_color'];
                                                if (!(array_key_exists($padraoID, $arrayConsultor1))){  
                                                    $arrayConsultor1[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                   if (($arrayConsultor1[$padraoID][1]) <> '#808080'){                                                 
                                                   $arrayConsultor1[$padraoID][0] = 2; 
                                                   $arrayConsultor1[$padraoID][1] = '#808080';
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao;
												   
                                               }
                                                   else{                                                   
                                                   $arrayConsultor1[$padraoID][0] = $arrayConsultor1[$padraoID][0] + 1;
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao; 
                                                   }                                                 
                                               }
                                                $mt = 'M';
                                                $padraoID = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['end_date'].'.'.'1';
												$padraoID2 = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['end_date'].'.'.'2';
												$padraoID3 = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['end_date'].'.'.'3';
												$padraoID4 = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['end_date'].'.'.'4';
												
												$arrayConsultor2[$padraoID2]=array('','White','');
												$arrayConsultor3[$padraoID3]=array('','White','');
												$arrayConsultor4[$padraoID4]=array('','White','');
                                                $descricao = $consultor1['activities']['description'];
                                                $sigla = $consultor1['consultants']['acronym'];
                                                $cor = $consultor1['consultants']['acronym_color'];
                                                if (!(array_key_exists($padraoID, $arrayConsultor1))){  
                                                    $arrayConsultor1[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                   if (($arrayConsultor1[$padraoID][1]) <> '#808080'){                                                 
                                                   $arrayConsultor1[$padraoID][0] = 2; 
                                                   $arrayConsultor1[$padraoID][1] = '#808080';
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao;
                                               }
                                                   else{                                                   
                                                   $arrayConsultor1[$padraoID][0] = $arrayConsultor1[$padraoID][0] + 1;
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao; 
                                                   }                                                 
                                                } 
                                                if ($consultor1['activities']['end_hours'] > '12:00:00'){
                                                $mt = 'T';
                                                $padraoID = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['end_date'].'.'.'1';
												$padraoID2 = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['end_date'].'.'.'2';
												$padraoID3 = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['end_date'].'.'.'3';
												$padraoID4 = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['end_date'].'.'.'4';
												$arrayConsultor2[$padraoID2]=array('','White','');
												$arrayConsultor3[$padraoID3]=array('','White','');
												$arrayConsultor4[$padraoID4]=array('','White','');
                                                $descricao = $consultor1['activities']['description'];
                                                $sigla = $consultor1['consultants']['acronym'];
                                                $cor = $consultor1['consultants']['acronym_color'];
                                                if (!(array_key_exists($padraoID, $arrayConsultor1))){  
                                                    $arrayConsultor1[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                   if (($arrayConsultor1[$padraoID][1]) <> '#808080'){                                                 
                                                   $arrayConsultor1[$padraoID][0] = 2; 
                                                   $arrayConsultor1[$padraoID][1] = '#808080';
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao;
                                               }
                                                   else{                                                   
                                                   $arrayConsultor1[$padraoID][0] = $arrayConsultor1[$padraoID][0] + 1;
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao; 
                                                   }                                                 
                                                 }
                                               } 
                                            }   
                                        
                                        elseif (((strtotime($consultor1['activities']['end_date'])-strtotime($consultor1['activities']['start_date']))/86400) > 1){
                                            $conta_dias=(((strtotime($consultor1['activities']['end_date'])-strtotime($consultor1['activities']['start_date']))/86400) + 1);
                                         $data = $consultor1['activities']['start_date'];
                                         for ($i =0; $i < $conta_dias; $i++) {
                                            
                                         if($i==0){
                                            if ($consultor1['activities']['start_hours'] < '12:00:00'){
                                                $mt = 'M';
                                                $padraoID = $consultor1['activities']['project_id'].'.M.'.$data.'.'.'1';
												$padraoID2 = $consultor1['activities']['project_id'].'.M.'.$data.'.'.'2';
												$padraoID3 = $consultor1['activities']['project_id'].'.M.'.$data.'.'.'3';
												$padraoID4 = $consultor1['activities']['project_id'].'.M.'.$data.'.'.'4';
												$arrayConsultor2[$padraoID2]=array('','White','');
												$arrayConsultor3[$padraoID3]=array('','White','');
												$arrayConsultor4[$padraoID4]=array('','White','');
                                                $descricao = $consultor1['activities']['description'];
                                                $sigla = $consultor1['consultants']['acronym'];
                                                $cor = $consultor1['consultants']['acronym_color'];
                                                if (!(array_key_exists($padraoID, $arrayConsultor1))){  
                                                    $arrayConsultor1[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                   if (($arrayConsultor1[$padraoID][1]) <> '#808080'){                                                 
                                                   $arrayConsultor1[$padraoID][0] = 2; 
                                                   $arrayConsultor1[$padraoID][1] = '#808080';
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao;
                                               }
                                                   else{                                                   
                                                   $arrayConsultor1[$padraoID][0] = $arrayConsultor1[$padraoID][0] + 1;
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao; 
                                                   }                                                 
                                               }
                                            }                                                 
                                                $mt = 'T';
                                                $padraoID = $consultor1['activities']['project_id'].'.T.'.$data.'.'.'1';
												$padraoID2 = $consultor1['activities']['project_id'].'.T.'.$data.'.'.'2';
												$padraoID3 = $consultor1['activities']['project_id'].'.T.'.$data.'.'.'3';
												$padraoID4 = $consultor1['activities']['project_id'].'.T.'.$data.'.'.'4';
												$arrayConsultor2[$padraoID2]=array('','White','');
												$arrayConsultor3[$padraoID3]=array('','White','');
												$arrayConsultor4[$padraoID4]=array('','White','');
                                                $descricao = $consultor1['activities']['description'];
                                                $sigla = $consultor1['consultants']['acronym'];
                                                $cor = $consultor1['consultants']['acronym_color'];
                                                if (!(array_key_exists($padraoID, $arrayConsultor1))){  
                                                    $arrayConsultor1[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                   if (($arrayConsultor1[$padraoID][1]) <> '#808080'){                                                 
                                                   $arrayConsultor1[$padraoID][0] = 2; 
                                                   $arrayConsultor1[$padraoID][1] = '#808080';
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao;
                                               }
                                                   else{                                                   
                                                   $arrayConsultor1[$padraoID][0] = $arrayConsultor1[$padraoID][0] + 1;
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao; 
                                                   }                                                 
                                                } 
                                            }

                                            elseif ($i==$conta_dias-1) {
                                                $mt = 'M';
                                                $padraoID = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['end_date'].'.'.'1';
												$padraoID2 = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['end_date'].'.'.'2';
												$padraoID3 = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['end_date'].'.'.'3';
												$padraoID4 = $consultor1['activities']['project_id'].'.M.'.$consultor1['activities']['end_date'].'.'.'4';
												$arrayConsultor2[$padraoID2]=array('','White','');
												$arrayConsultor3[$padraoID3]=array('','White','');
												$arrayConsultor4[$padraoID4]=array('','White','');
                                                $descricao = $consultor1['activities']['description'];
                                                $sigla = $consultor1['consultants']['acronym'];
                                                $cor = $consultor1['consultants']['acronym_color'];
                                                if (!(array_key_exists($padraoID, $arrayConsultor1))){  
                                                    $arrayConsultor1[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                   if (($arrayConsultor1[$padraoID][1]) <> '#808080'){                                                 
                                                   $arrayConsultor1[$padraoID][0] = 2; 
                                                   $arrayConsultor1[$padraoID][1] = '#808080';
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao;
                                               }
                                                   else{                                                   
                                                   $arrayConsultor1[$padraoID][0] = $arrayConsultor1[$padraoID][0] + 1;
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao; 
                                                   }                                                 
                                               } 
                                                
                                                if ($consultor1['activities']['end_hours'] > '12:00:00'){
                                                $mt = 'T';
                                                $padraoID = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['end_date'].'.'.'1';
												$padraoID2 = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['end_date'].'.'.'2';
												$padraoID3 = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['end_date'].'.'.'3';
												$padraoID4 = $consultor1['activities']['project_id'].'.T.'.$consultor1['activities']['end_date'].'.'.'4';
												$arrayConsultor2[$padraoID2]=array('','White','');
												$arrayConsultor3[$padraoID3]=array('','White','');
												$arrayConsultor4[$padraoID4]=array('','White','');
                                                $descricao = $consultor1['activities']['description'];
                                                $sigla = $consultor1['consultants']['acronym'];
                                                $cor = $consultor1['consultants']['acronym_color'];
                                                if (!(array_key_exists($padraoID, $arrayConsultor1))){  
                                                    $arrayConsultor1[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                   if (($arrayConsultor1[$padraoID][1]) <> '#808080'){                                                 
                                                   $arrayConsultor1[$padraoID][0] = 2; 
                                                   $arrayConsultor1[$padraoID][1] = '#808080';
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao;
                                               }
                                                   else{                                                   
                                                   $arrayConsultor1[$padraoID][0] = $arrayConsultor1[$padraoID][0] + 1;
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao; 
                                                   }                                                 
                                                }
                                              }
                                            }
                                            else{
                                              
                                                $mt = 'M';
                                                $padraoID = $consultor1['activities']['project_id'].'.M.'.$data.'.'.'1';
												$padraoID2 = $consultor1['activities']['project_id'].'.M.'.$data.'.'.'2';
												$padraoID3 = $consultor1['activities']['project_id'].'.M.'.$data.'.'.'3';
												$padraoID4 = $consultor1['activities']['project_id'].'.M.'.$data.'.'.'4';
												$arrayConsultor2[$padraoID2]=array('','White','');
												$arrayConsultor3[$padraoID3]=array('','White','');
												$arrayConsultor4[$padraoID4]=array('','White','');
                                                $descricao = $consultor1['activities']['description'];
                                                $sigla = $consultor1['consultants']['acronym'];
                                                $cor = $consultor1['consultants']['acronym_color'];
                                                if (!(array_key_exists($padraoID, $arrayConsultor1))){  
                                                    $arrayConsultor1[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                   if (($arrayConsultor1[$padraoID][1]) <> '#808080'){                                                 
                                                   $arrayConsultor1[$padraoID][0] = 2; 
                                                   $arrayConsultor1[$padraoID][1] = '#808080';
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao;
                                               }
                                                   else{                                                   
                                                   $arrayConsultor1[$padraoID][0] = $arrayConsultor1[$padraoID][0] + 1;
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao; 
                                                   }                                                 
                                               } 

                                                $mt = 'T';
                                                $padraoID = $consultor1['activities']['project_id'].'.T.'.$data.'.'.'1';
												$padraoID2 = $consultor1['activities']['project_id'].'.T.'.$data.'.'.'2';
												$padraoID3 = $consultor1['activities']['project_id'].'.T.'.$data.'.'.'3';
												$padraoID4 = $consultor1['activities']['project_id'].'.T.'.$data.'.'.'4';
												$arrayConsultor2[$padraoID2]=array('','White','');
												$arrayConsultor3[$padraoID3]=array('','White','');
												$arrayConsultor4[$padraoID4]=array('','White','');
                                                $descricao = $consultor1['activities']['description'];
                                                $sigla = $consultor1['consultants']['acronym'];
                                                $cor = $consultor1['consultants']['acronym_color'];
                                                if (!(array_key_exists($padraoID, $arrayConsultor1))){  
                                                    $arrayConsultor1[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                   if (($arrayConsultor1[$padraoID][1]) <> '#808080'){                                                 
                                                   $arrayConsultor1[$padraoID][0] = 2; 
                                                   $arrayConsultor1[$padraoID][1] = '#808080';
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao;
                                               }
                                                   else{                                                   
                                                   $arrayConsultor1[$padraoID][0] = $arrayConsultor1[$padraoID][0] + 1;
                                                   $arrayConsultor1[$padraoID][2] = $arrayConsultor1[$padraoID][2].', '.$descricao; 
                                                   }                                                 
                                               }

                                             }
                                              $data = date('Y-m-d', strtotime("+1 days",strtotime($data)));
                                            }
                                           }
                                       }
                                         
                                
                                $this -> set ('arrayConsultor1',$arrayConsultor1);
                            
                                
                                //Tuplas da posicao do consultor 2
                                $consultor2PadraoId = $this->Home->Activity->query('select activities.project_id, activities.start_hours, activities.end_hours, activities.start_date, activities.end_date, activities.description, consultants.name, consultants.acronym, consultants.acronym_color from consultants, activities where activities.status = "Planejada" and activities.consultant2_id = consultants.id and activities.removed != 1 and activities.consultant2_id is not null');                      
                                
                       
                                foreach ($consultor2PadraoId as $consultor2) {
                                     if(($consultor2['activities']['start_date'])==($consultor2['activities']['end_date'])){
                                        if ($consultor2['activities']['start_hours'] < '12:00:00'){
                                                $mt = 'M';
                                                $padraoID = $consultor2['activities']['project_id'].'.M.'.$consultor2['activities']['start_date'].'.'.'2';
												$padraoID1 = $consultor2['activities']['project_id'].'.M.'.$consultor2['activities']['start_date'].'.'.'1';
												
                                                $descricao = $consultor2['activities']['description'];
                                                $sigla = $consultor2['consultants']['acronym'];
                                                $cor = $consultor2['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor2))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor2[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor2[$padraoID][0] = '';
                                                   $arrayConsultor2[$padraoID][1] = 'White';
                                                   $arrayConsultor2[$padraoID][2] = '';                                                                                      
                                               }
                                                                                            
                                        }
                                        if ($consultor2['activities']['end_hours'] > '12:00:00'){
                                                $mt = 'T';
                                                $padraoID = $consultor2['activities']['project_id'].'.T.'.$consultor2['activities']['start_date'].'.'.'2';
												$padraoID1 = $consultor2['activities']['project_id'].'.T.'.$consultor2['activities']['start_date'].'.'.'1';
                                                $descricao = $consultor2['activities']['description'];
                                                $sigla = $consultor2['consultants']['acronym'];
                                                $cor = $consultor2['consultants']['acronym_color'];
                                              if ((!(array_key_exists($padraoID, $arrayConsultor2))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor2[$padraoID]=array($sigla,$cor,$descricao);
                                                }
                                                else{
                                                                                               
                                                   $arrayConsultor2[$padraoID][0] = '';
                                                   $arrayConsultor2[$padraoID][1] = 'White';
                                                   $arrayConsultor2[$padraoID][2] = '';                                                                                      
                                               } 
                                             
                                          }                                                                
                                    }elseif(((strtotime($consultor2['activities']['end_date'])-strtotime($consultor2['activities']['start_date']))/86400) == 1){
                                            
                                                if ($consultor2['activities']['start_hours'] < '12:00:00'){
                                                $mt = 'M';
                                                $padraoID = $consultor2['activities']['project_id'].'.M.'.$consultor2['activities']['start_date'].'.'.'2';
												$padraoID1 = $consultor2['activities']['project_id'].'.M.'.$consultor2['activities']['start_date'].'.'.'1';
                                                $descricao = $consultor2['activities']['description'];
                                                $sigla = $consultor2['consultants']['acronym'];
                                                $cor = $consultor2['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor2))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){   
                                                    
													$arrayConsultor2[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor2[$padraoID][0] = '';
                                                   $arrayConsultor2[$padraoID][1] = 'White';
                                                   $arrayConsultor2[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                                }
                                                
                                                $mt = 'T';
                                                $padraoID = $consultor2['activities']['project_id'].'.T.'.$consultor2['activities']['start_date'].'.'.'2';
												$padraoID1 = $consultor2['activities']['project_id'].'.T.'.$consultor2['activities']['start_date'].'.'.'1';
                                                $descricao = $consultor2['activities']['description'];
                                                $sigla = $consultor2['consultants']['acronym'];
                                                $cor = $consultor2['consultants']['acronym_color'];
                                               if ((!(array_key_exists($padraoID, $arrayConsultor2))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor2[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor2[$padraoID][0] = '';
                                                   $arrayConsultor2[$padraoID][1] = 'White';
                                                   $arrayConsultor2[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                                $mt = 'M';
                                                $padraoID = $consultor2['activities']['project_id'].'.M.'.$consultor2['activities']['end_date'].'.'.'2';
												$padraoID1 = $consultor2['activities']['project_id'].'.M.'.$consultor2['activities']['end_date'].'.'.'1';
                                                $descricao = $consultor2['activities']['description'];
                                                $sigla = $consultor2['consultants']['acronym'];
                                                $cor = $consultor2['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor2))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor2[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor2[$padraoID][0] = '';
                                                   $arrayConsultor2[$padraoID][1] = 'White';
                                                   $arrayConsultor2[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                                if ($consultor2['activities']['end_hours'] > '12:00:00'){
                                                $mt = 'T';
                                                $padraoID = $consultor2['activities']['project_id'].'.T.'.$consultor2['activities']['end_date'].'.'.'2';
												$padraoID1 = $consultor2['activities']['project_id'].'.T.'.$consultor2['activities']['end_date'].'.'.'1';
                                                $descricao = $consultor2['activities']['description'];
                                                $sigla = $consultor2['consultants']['acronym'];
                                                $cor = $consultor2['consultants']['acronym_color'];
                                               if ((!(array_key_exists($padraoID, $arrayConsultor2))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor2[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                               else{
                                                                                               
                                                   $arrayConsultor2[$padraoID][0] = '';
                                                   $arrayConsultor2[$padraoID][1] = 'White';
                                                   $arrayConsultor2[$padraoID][2] = '';                                                                                      
                                               }
                                               } 
                                            }   
                                        
                                        elseif (((strtotime($consultor2['activities']['end_date'])-strtotime($consultor2['activities']['start_date']))/86400) > 1){
                                            $conta_dias=(((strtotime($consultor2['activities']['end_date'])-strtotime($consultor2['activities']['start_date']))/86400) + 1);
                                         $data = $consultor2['activities']['start_date'];
                                         for ($i =0; $i < $conta_dias; $i++) {
                                            
                                         if($i==0){
                                            if ($consultor2['activities']['start_hours'] < '12:00:00'){
                                                $mt = 'M';
                                                $padraoID = $consultor2['activities']['project_id'].'.M.'.$data.'.'.'2';
												$padraoID1 = $consultor2['activities']['project_id'].'.M.'.$data.'.'.'1';
                                                $descricao = $consultor2['activities']['description'];
                                                $sigla = $consultor2['consultants']['acronym'];
                                                $cor = $consultor2['consultants']['acronym_color'];
                                               if ((!(array_key_exists($padraoID, $arrayConsultor2))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor2[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor2[$padraoID][0] = '';
                                                   $arrayConsultor2[$padraoID][1] = 'White';
                                                   $arrayConsultor2[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                            }                                                 
                                                $mt = 'T';
                                                $padraoID = $consultor2['activities']['project_id'].'.T.'.$data.'.'.'2';
												$padraoID1 = $consultor2['activities']['project_id'].'.T.'.$data.'.'.'1';
                                                $descricao = $consultor2['activities']['description'];
                                                $sigla = $consultor2['consultants']['acronym'];
                                                $cor = $consultor2['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor2))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor2[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                               else{
                                                                                               
                                                   $arrayConsultor2[$padraoID][0] = '';
                                                   $arrayConsultor2[$padraoID][1] = 'White';
                                                   $arrayConsultor2[$padraoID][2] = '';                                                                                      
                                               }
                                               
                                            }

                                            elseif ($i==$conta_dias-1) {
                                                $mt = 'M';
                                                $padraoID = $consultor2['activities']['project_id'].'.M.'.$consultor2['activities']['end_date'].'.'.'2';
												$padraoID1 = $consultor2['activities']['project_id'].'.M.'.$consultor2['activities']['end_date'].'.'.'1';
                                                $descricao = $consultor2['activities']['description'];
                                                $sigla = $consultor2['consultants']['acronym'];
                                                $cor = $consultor2['consultants']['acronym_color'];
                                               if ((!(array_key_exists($padraoID, $arrayConsultor2))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor2[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor2[$padraoID][0] = '';
                                                   $arrayConsultor2[$padraoID][1] = 'White';
                                                   $arrayConsultor2[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                                
                                                if ($consultor2['activities']['end_hours'] > '12:00:00'){
                                                $mt = 'T';
                                                $padraoID = $consultor2['activities']['project_id'].'.T.'.$consultor2['activities']['end_date'].'.'.'2';
												$padraoID1 = $consultor2['activities']['project_id'].'.T.'.$consultor2['activities']['end_date'].'.'.'1';
                                                $descricao = $consultor2['activities']['description'];
                                                $sigla = $consultor2['consultants']['acronym'];
                                                $cor = $consultor2['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor2))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){   
                                                    $arrayConsultor2[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor2[$padraoID][0] = '';
                                                   $arrayConsultor2[$padraoID][1] = 'White';
                                                   $arrayConsultor2[$padraoID][2] = '';                                                                                      
                                               }
                                               
                                              }
                                            }
                                            else{
                                              
                                                $mt = 'M';
                                                $padraoID = $consultor2['activities']['project_id'].'.M.'.$data.'.'.'2';
											    $padraoID1 = $consultor2['activities']['project_id'].'.M.'.$data.'.'.'1';
                                                $descricao = $consultor2['activities']['description'];
                                                $sigla = $consultor2['consultants']['acronym'];
                                                $cor = $consultor2['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor2))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor2[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor2[$padraoID][0] = '';
                                                   $arrayConsultor2[$padraoID][1] = 'White';
                                                   $arrayConsultor2[$padraoID][2] = '';                                                                                      
                                               }
                                               

                                                $mt = 'T';
                                                $padraoID = $consultor2['activities']['project_id'].'.T.'.$data.'.'.'2';
												$padraoID1 = $consultor2['activities']['project_id'].'.T.'.$data.'.'.'1';
                                                $descricao = $consultor2['activities']['description'];
                                                $sigla = $consultor2['consultants']['acronym'];
                                                $cor = $consultor2['consultants']['acronym_color'];
                                              if ((!(array_key_exists($padraoID, $arrayConsultor2))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor2[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor2[$padraoID][0] = '';
                                                   $arrayConsultor2[$padraoID][1] = 'White';
                                                   $arrayConsultor2[$padraoID][2] = '';                                                                                      
                                               }
                                                

                                             }
                                              $data = date('Y-m-d', strtotime("+1 days",strtotime($data)));
                                            }
                                           }
                                       }
                                         
                                
                                $this -> set ('arrayConsultor2',$arrayConsultor2);

                                //Tuplas da posicao do consultor 3
                                $consultor3PadraoId = $this->Home->Activity->query('select activities.project_id, activities.start_hours, activities.end_hours, activities.start_date, activities.end_date, activities.description, consultants.name, consultants.acronym, consultants.acronym_color from consultants, activities where activities.status = "Planejada" and activities.consultant3_id = consultants.id and activities.removed != 1 and activities.consultant3_id is not null');                      
                                
                       
                                foreach ($consultor3PadraoId as $consultor3) {
                                     if(($consultor3['activities']['start_date'])==($consultor3['activities']['end_date'])){
                                        if ($consultor3['activities']['start_hours'] < '12:00:00'){
                                                $mt = 'M';
                                                $padraoID = $consultor3['activities']['project_id'].'.M.'.$consultor3['activities']['start_date'].'.'.'3';
												$padraoID1 = $consultor3['activities']['project_id'].'.M.'.$consultor3['activities']['start_date'].'.'.'1';
												
                                                $descricao = $consultor3['activities']['description'];
                                                $sigla = $consultor3['consultants']['acronym'];
                                                $cor = $consultor3['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor3))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor3[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor3[$padraoID][0] = '';
                                                   $arrayConsultor3[$padraoID][1] = '#E0EEE0';
                                                   $arrayConsultor3[$padraoID][2] = '';                                                                                      
                                               }
                                                                                            
                                        }
                                        if ($consultor3['activities']['end_hours'] > '12:00:00'){
                                                $mt = 'T';
                                                $padraoID = $consultor3['activities']['project_id'].'.T.'.$consultor3['activities']['start_date'].'.'.'3';
												$padraoID1 = $consultor3['activities']['project_id'].'.T.'.$consultor3['activities']['start_date'].'.'.'1';
                                                $descricao = $consultor3['activities']['description'];
                                                $sigla = $consultor3['consultants']['acronym'];
                                                $cor = $consultor3['consultants']['acronym_color'];
                                              if ((!(array_key_exists($padraoID, $arrayConsultor3))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor3[$padraoID]=array($sigla,$cor,$descricao);
                                                }
                                                else{
                                                                                               
                                                   $arrayConsultor3[$padraoID][0] = '';
                                                   $arrayConsultor3[$padraoID][1] = 'White';
                                                   $arrayConsultor3[$padraoID][2] = '';                                                                                      
                                               } 
                                             
                                          }                                                                
                                    }elseif(((strtotime($consultor3['activities']['end_date'])-strtotime($consultor3['activities']['start_date']))/86400) == 1){
                                            
                                                if ($consultor3['activities']['start_hours'] < '12:00:00'){
                                                $mt = 'M';
                                                $padraoID = $consultor3['activities']['project_id'].'.M.'.$consultor3['activities']['start_date'].'.'.'3';
												$padraoID1 = $consultor3['activities']['project_id'].'.M.'.$consultor3['activities']['start_date'].'.'.'1';
                                                $descricao = $consultor3['activities']['description'];
                                                $sigla = $consultor3['consultants']['acronym'];
                                                $cor = $consultor3['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor3))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){   
                                                    
													$arrayConsultor3[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor3[$padraoID][0] = '';
                                                   $arrayConsultor3[$padraoID][1] = '#E0EEE0';
                                                   $arrayConsultor3[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                                }
                                                
                                                $mt = 'T';
                                                $padraoID = $consultor3['activities']['project_id'].'.T.'.$consultor3['activities']['start_date'].'.'.'3';
												$padraoID1 = $consultor3['activities']['project_id'].'.T.'.$consultor3['activities']['start_date'].'.'.'1';
                                                $descricao = $consultor3['activities']['description'];
                                                $sigla = $consultor3['consultants']['acronym'];
                                                $cor = $consultor3['consultants']['acronym_color'];
                                               if ((!(array_key_exists($padraoID, $arrayConsultor3))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor3[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor3[$padraoID][0] = '';
                                                   $arrayConsultor3[$padraoID][1] = '#E0EEE0';
                                                   $arrayConsultor3[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                                $mt = 'M';
                                                $padraoID = $consultor3['activities']['project_id'].'.M.'.$consultor3['activities']['end_date'].'.'.'3';
												$padraoID1 = $consultor3['activities']['project_id'].'.M.'.$consultor3['activities']['end_date'].'.'.'1';
                                                $descricao = $consultor3['activities']['description'];
                                                $sigla = $consultor3['consultants']['acronym'];
                                                $cor = $consultor3['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor3))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor3[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor3[$padraoID][0] = '';
                                                   $arrayConsultor3[$padraoID][1] = '#E0EEE0';
                                                   $arrayConsultor3[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                                if ($consultor3['activities']['end_hours'] > '12:00:00'){
                                                $mt = 'T';
                                                $padraoID = $consultor3['activities']['project_id'].'.T.'.$consultor3['activities']['end_date'].'.'.'3';
												$padraoID1 = $consultor3['activities']['project_id'].'.T.'.$consultor3['activities']['end_date'].'.'.'1';
                                                $descricao = $consultor3['activities']['description'];
                                                $sigla = $consultor3['consultants']['acronym'];
                                                $cor = $consultor3['consultants']['acronym_color'];
                                               if ((!(array_key_exists($padraoID, $arrayConsultor3))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor3[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                               else{
                                                                                               
                                                   $arrayConsultor3[$padraoID][0] = '';
                                                   $arrayConsultor3[$padraoID][1] = '#E0EEE0';
                                                   $arrayConsultor3[$padraoID][2] = '';                                                                                      
                                               }
                                               } 
                                            }   
                                        
                                        elseif (((strtotime($consultor3['activities']['end_date'])-strtotime($consultor3['activities']['start_date']))/86400) > 1){
                                            $conta_dias=(((strtotime($consultor3['activities']['end_date'])-strtotime($consultor3['activities']['start_date']))/86400) + 1);
                                         $data = $consultor3['activities']['start_date'];
                                         for ($i =0; $i < $conta_dias; $i++) {
                                            
                                         if($i==0){
                                            if ($consultor3['activities']['start_hours'] < '12:00:00'){
                                                $mt = 'M';
                                                $padraoID = $consultor3['activities']['project_id'].'.M.'.$data.'.'.'3';
												$padraoID1 = $consultor3['activities']['project_id'].'.M.'.$data.'.'.'1';
                                                $descricao = $consultor3['activities']['description'];
                                                $sigla = $consultor3['consultants']['acronym'];
                                                $cor = $consultor3['consultants']['acronym_color'];
                                               if ((!(array_key_exists($padraoID, $arrayConsultor3))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor3[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor3[$padraoID][0] = '';
                                                   $arrayConsultor3[$padraoID][1] = '#E0EEE0';
                                                   $arrayConsultor3[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                            }                                                 
                                                $mt = 'T';
                                                $padraoID = $consultor3['activities']['project_id'].'.T.'.$data.'.'.'3';
												$padraoID1 = $consultor3['activities']['project_id'].'.T.'.$data.'.'.'1';
                                                $descricao = $consultor3['activities']['description'];
                                                $sigla = $consultor3['consultants']['acronym'];
                                                $cor = $consultor3['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor3))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor3[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                               else{
                                                                                               
                                                   $arrayConsultor3[$padraoID][0] = '';
                                                   $arrayConsultor3[$padraoID][1] = '#E0EEE0';
                                                   $arrayConsultor3[$padraoID][2] = '';                                                                                      
                                               }
                                               
                                            }

                                            elseif ($i==$conta_dias-1) {
                                                $mt = 'M';
                                                $padraoID = $consultor3['activities']['project_id'].'.M.'.$consultor3['activities']['end_date'].'.'.'3';
												$padraoID1 = $consultor3['activities']['project_id'].'.M.'.$consultor3['activities']['end_date'].'.'.'1';
                                                $descricao = $consultor3['activities']['description'];
                                                $sigla = $consultor3['consultants']['acronym'];
                                                $cor = $consultor3['consultants']['acronym_color'];
                                               if ((!(array_key_exists($padraoID, $arrayConsultor3))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor3[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor3[$padraoID][0] = '';
                                                   $arrayConsultor3[$padraoID][1] = '#E0EEE0';
                                                   $arrayConsultor3[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                                
                                                if ($consultor3['activities']['end_hours'] > '12:00:00'){
                                                $mt = 'T';
                                                $padraoID = $consultor3['activities']['project_id'].'.T.'.$consultor3['activities']['end_date'].'.'.'3';
												$padraoID1 = $consultor3['activities']['project_id'].'.T.'.$consultor3['activities']['end_date'].'.'.'1';
                                                $descricao = $consultor3['activities']['description'];
                                                $sigla = $consultor3['consultants']['acronym'];
                                                $cor = $consultor3['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor3))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){   
                                                    $arrayConsultor3[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor3[$padraoID][0] = '';
                                                   $arrayConsultor3[$padraoID][1] = '#E0EEE0';
                                                   $arrayConsultor3[$padraoID][2] = '';                                                                                      
                                               }
                                               
                                              }
                                            }
                                            else{
                                              
                                                $mt = 'M';
                                                $padraoID = $consultor3['activities']['project_id'].'.M.'.$data.'.'.'3';
											    $padraoID1 = $consultor3['activities']['project_id'].'.M.'.$data.'.'.'1';
                                                $descricao = $consultor3['activities']['description'];
                                                $sigla = $consultor3['consultants']['acronym'];
                                                $cor = $consultor3['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor3))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor3[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor3[$padraoID][0] = '';
                                                   $arrayConsultor3[$padraoID][1] = '#E0EEE0';
                                                   $arrayConsultor3[$padraoID][2] = '';                                                                                      
                                               }
                                               

                                                $mt = 'T';
                                                $padraoID = $consultor3['activities']['project_id'].'.T.'.$data.'.'.'3';
												$padraoID1 = $consultor3['activities']['project_id'].'.T.'.$data.'.'.'1';
                                                $descricao = $consultor3['activities']['description'];
                                                $sigla = $consultor3['consultants']['acronym'];
                                                $cor = $consultor3['consultants']['acronym_color'];
                                              if ((!(array_key_exists($padraoID, $arrayConsultor3))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor3[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor3[$padraoID][0] = '';
                                                   $arrayConsultor3[$padraoID][1] = '#E0EEE0';
                                                   $arrayConsultor3[$padraoID][2] = '';                                                                                      
                                               }
                                                

                                             }
                                              $data = date('Y-m-d', strtotime("+1 days",strtotime($data)));
                                            }
                                           }
                                       }
                                         
                                
                                $this -> set ('arrayConsultor3',$arrayConsultor3);

                                //Tuplas da posicao do consultor 4
                                $consultor4PadraoId = $this->Home->Activity->query('select activities.project_id, activities.start_hours, activities.end_hours, activities.start_date, activities.end_date, activities.description, consultants.name, consultants.acronym, consultants.acronym_color from consultants, activities where activities.status = "Planejada" and activities.consultant4_id = consultants.id and activities.removed != 1 and activities.consultant4_id is not null');                      
                                
                       
                                foreach ($consultor4PadraoId as $consultor4) {
                                     if(($consultor4['activities']['start_date'])==($consultor4['activities']['end_date'])){
                                        if ($consultor4['activities']['start_hours'] < '12:00:00'){
                                                $mt = 'M';
                                                $padraoID = $consultor4['activities']['project_id'].'.M.'.$consultor4['activities']['start_date'].'.'.'4';
												$padraoID1 = $consultor4['activities']['project_id'].'.M.'.$consultor4['activities']['start_date'].'.'.'1';
												
                                                $descricao = $consultor4['activities']['description'];
                                                $sigla = $consultor4['consultants']['acronym'];
                                                $cor = $consultor4['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor4))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor4[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor4[$padraoID][0] = '';
                                                   $arrayConsultor4[$padraoID][1] = 'White';
                                                   $arrayConsultor4[$padraoID][2] = '';                                                                                      
                                               }
                                                                                            
                                        }
                                        if ($consultor4['activities']['end_hours'] > '12:00:00'){
                                                $mt = 'T';
                                                $padraoID = $consultor4['activities']['project_id'].'.T.'.$consultor4['activities']['start_date'].'.'.'4';
												$padraoID1 = $consultor4['activities']['project_id'].'.T.'.$consultor4['activities']['start_date'].'.'.'1';
                                                $descricao = $consultor4['activities']['description'];
                                                $sigla = $consultor4['consultants']['acronym'];
                                                $cor = $consultor4['consultants']['acronym_color'];
                                              if ((!(array_key_exists($padraoID, $arrayConsultor4))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor4[$padraoID]=array($sigla,$cor,$descricao);
                                                }
                                                else{
                                                                                               
                                                   $arrayConsultor4[$padraoID][0] = '';
                                                   $arrayConsultor4[$padraoID][1] = 'White';
                                                   $arrayConsultor4[$padraoID][2] = '';                                                                                      
                                               } 
                                             
                                          }                                                                
                                    }elseif(((strtotime($consultor4['activities']['end_date'])-strtotime($consultor4['activities']['start_date']))/86400) == 1){
                                            
                                                if ($consultor4['activities']['start_hours'] < '12:00:00'){
                                                $mt = 'M';
                                                $padraoID = $consultor4['activities']['project_id'].'.M.'.$consultor4['activities']['start_date'].'.'.'4';
												$padraoID1 = $consultor4['activities']['project_id'].'.M.'.$consultor4['activities']['start_date'].'.'.'1';
                                                $descricao = $consultor4['activities']['description'];
                                                $sigla = $consultor4['consultants']['acronym'];
                                                $cor = $consultor4['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor4))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){   
                                                    
													$arrayConsultor4[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor4[$padraoID][0] = '';
                                                   $arrayConsultor4[$padraoID][1] = 'White';
                                                   $arrayConsultor4[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                                }
                                                
                                                $mt = 'T';
                                                $padraoID = $consultor4['activities']['project_id'].'.T.'.$consultor4['activities']['start_date'].'.'.'4';
												$padraoID1 = $consultor4['activities']['project_id'].'.T.'.$consultor4['activities']['start_date'].'.'.'1';
                                                $descricao = $consultor4['activities']['description'];
                                                $sigla = $consultor4['consultants']['acronym'];
                                                $cor = $consultor4['consultants']['acronym_color'];
                                               if ((!(array_key_exists($padraoID, $arrayConsultor4))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor4[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor4[$padraoID][0] = '';
                                                   $arrayConsultor4[$padraoID][1] = 'White';
                                                   $arrayConsultor4[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                                $mt = 'M';
                                                $padraoID = $consultor4['activities']['project_id'].'.M.'.$consultor4['activities']['end_date'].'.'.'4';
												$padraoID1 = $consultor4['activities']['project_id'].'.M.'.$consultor4['activities']['end_date'].'.'.'1';
                                                $descricao = $consultor4['activities']['description'];
                                                $sigla = $consultor4['consultants']['acronym'];
                                                $cor = $consultor4['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor4))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor4[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor4[$padraoID][0] = '';
                                                   $arrayConsultor4[$padraoID][1] = 'White';
                                                   $arrayConsultor4[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                                if ($consultor4['activities']['end_hours'] > '12:00:00'){
                                                $mt = 'T';
                                                $padraoID = $consultor4['activities']['project_id'].'.T.'.$consultor4['activities']['end_date'].'.'.'4';
												$padraoID1 = $consultor4['activities']['project_id'].'.T.'.$consultor4['activities']['end_date'].'.'.'1';
                                                $descricao = $consultor4['activities']['description'];
                                                $sigla = $consultor4['consultants']['acronym'];
                                                $cor = $consultor4['consultants']['acronym_color'];
                                               if ((!(array_key_exists($padraoID, $arrayConsultor4))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor4[$padraoID]=array($sigla,$cor,$descricao);
													
                                                } 
                                               else{
                                                                                               
                                                   $arrayConsultor4[$padraoID][0] = '';
                                                   $arrayConsultor4[$padraoID][1] = 'White';
                                                   $arrayConsultor4[$padraoID][2] = '';                                                                                      
                                               }
                                               } 
                                            }   
                                        
                                        elseif (((strtotime($consultor4['activities']['end_date'])-strtotime($consultor4['activities']['start_date']))/86400) > 1){
                                            $conta_dias=(((strtotime($consultor4['activities']['end_date'])-strtotime($consultor4['activities']['start_date']))/86400) + 1);
                                         $data = $consultor4['activities']['start_date'];
                                         for ($i =0; $i < $conta_dias; $i++) {
                                            
                                         if($i==0){
                                            if ($consultor4['activities']['start_hours'] < '12:00:00'){
                                                $mt = 'M';
                                                $padraoID = $consultor4['activities']['project_id'].'.M.'.$data.'.'.'4';
												$padraoID1 = $consultor4['activities']['project_id'].'.M.'.$data.'.'.'1';
                                                $descricao = $consultor4['activities']['description'];
                                                $sigla = $consultor4['consultants']['acronym'];
                                                $cor = $consultor4['consultants']['acronym_color'];
                                               if ((!(array_key_exists($padraoID, $arrayConsultor4))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor4[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor4[$padraoID][0] = '';
                                                   $arrayConsultor4[$padraoID][1] = 'White';
                                                   $arrayConsultor4[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                            }                                                 
                                                $mt = 'T';
                                                $padraoID = $consultor4['activities']['project_id'].'.T.'.$data.'.'.'4';
												$padraoID1 = $consultor4['activities']['project_id'].'.T.'.$data.'.'.'1';
                                                $descricao = $consultor4['activities']['description'];
                                                $sigla = $consultor4['consultants']['acronym'];
                                                $cor = $consultor4['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor4))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor4[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                               else{
                                                                                               
                                                   $arrayConsultor4[$padraoID][0] = '';
                                                   $arrayConsultor4[$padraoID][1] = 'White';
                                                   $arrayConsultor4[$padraoID][2] = '';                                                                                      
                                               }
                                               
                                            }

                                            elseif ($i==$conta_dias-1) {
                                                $mt = 'M';
                                                $padraoID = $consultor4['activities']['project_id'].'.M.'.$consultor4['activities']['end_date'].'.'.'4';
												$padraoID1 = $consultor4['activities']['project_id'].'.M.'.$consultor4['activities']['end_date'].'.'.'1';
                                                $descricao = $consultor4['activities']['description'];
                                                $sigla = $consultor4['consultants']['acronym'];
                                                $cor = $consultor4['consultants']['acronym_color'];
                                               if ((!(array_key_exists($padraoID, $arrayConsultor4))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor4[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor4[$padraoID][0] = '';
                                                   $arrayConsultor4[$padraoID][1] = 'White';
                                                   $arrayConsultor4[$padraoID][2] = '';                                                                                      
                                               }
                                                
                                                
                                                if ($consultor4['activities']['end_hours'] > '12:00:00'){
                                                $mt = 'T';
                                                $padraoID = $consultor4['activities']['project_id'].'.T.'.$consultor4['activities']['end_date'].'.'.'4';
												$padraoID1 = $consultor4['activities']['project_id'].'.T.'.$consultor4['activities']['end_date'].'.'.'1';
                                                $descricao = $consultor4['activities']['description'];
                                                $sigla = $consultor4['consultants']['acronym'];
                                                $cor = $consultor4['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor4))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){   
                                                    $arrayConsultor4[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor4[$padraoID][0] = '';
                                                   $arrayConsultor4[$padraoID][1] = 'White';
                                                   $arrayConsultor4[$padraoID][2] = '';                                                                                      
                                               }
                                               
                                              }
                                            }
                                            else{
                                              
                                                $mt = 'M';
                                                $padraoID = $consultor4['activities']['project_id'].'.M.'.$data.'.'.'4';
											    $padraoID1 = $consultor4['activities']['project_id'].'.M.'.$data.'.'.'1';
                                                $descricao = $consultor4['activities']['description'];
                                                $sigla = $consultor4['consultants']['acronym'];
                                                $cor = $consultor4['consultants']['acronym_color'];
                                                if ((!(array_key_exists($padraoID, $arrayConsultor4))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor4[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor4[$padraoID][0] = '';
                                                   $arrayConsultor4[$padraoID][1] = 'White';
                                                   $arrayConsultor4[$padraoID][2] = '';                                                                                      
                                               }
                                               

                                                $mt = 'T';
                                                $padraoID = $consultor4['activities']['project_id'].'.T.'.$data.'.'.'4';
												$padraoID1 = $consultor4['activities']['project_id'].'.T.'.$data.'.'.'1';
                                                $descricao = $consultor4['activities']['description'];
                                                $sigla = $consultor4['consultants']['acronym'];
                                                $cor = $consultor4['consultants']['acronym_color'];
                                              if ((!(array_key_exists($padraoID, $arrayConsultor4))) or (!(in_array($arrayConsultor1[$padraoID1][0],[1,2,3,4,5,6,7,8,9,10])))){  
                                                    $arrayConsultor4[$padraoID]=array($sigla,$cor,$descricao);
                                                } 
                                                else{
                                                                                               
                                                   $arrayConsultor4[$padraoID][0] = '';
                                                   $arrayConsultor4[$padraoID][1] = 'White';
                                                   $arrayConsultor4[$padraoID][2] = '';                                                                                      
                                               }
                                                

                                             }
                                              $data = date('Y-m-d', strtotime("+1 days",strtotime($data)));
                                            }
                                           }
                                       }
                                         
                                
                                $this -> set ('arrayConsultor4',$arrayConsultor4);
                                
        }
        
        public function edition_agenda($string){        
                $this->layout = 'edition_agenda';       
                $stringFatiada = explode('.' , $string);
                $projeto_id = $stringFatiada[0];
                $turno = $stringFatiada[1];
                $data = $stringFatiada[2];
                $data= str_replace("-", "/", $data);
                $consultor = $stringFatiada[3];
                $sigla = $stringFatiada[4];
                
                if ($this->search_abbreviation($sigla)){        
                
                        if ($this->search_activity($projeto_id, $data, $turno)){
                                $this->edition_activity($projeto_id, $data, $turno, $this->search_abbreviation($sigla), $consultor);
                        }
                        else{
                                $this->insert_activity($projeto_id, $turno, $data, $consultor, $this->search_abbreviation($sigla));
                        }
                        $retorno = array();
                        $retorno['mensagem'] = 'ok';
                        echo json_encode($retorno);
                }
                elseif ($sigla == 'NULO') {
                        if ($this->search_activity($projeto_id, $data, $turno)){
                                $this->edition_activity($projeto_id, $data, $turno, NULL, $consultor);
                                if (!$this->check_consultant($projeto_id, $data, $turno)) {
                                        $this->delete_activity($projeto_id, $data, $turno);
                                }
                        }
                        $retorno = array();
                        $retorno['mensagem'] = 'ok';
                        echo json_encode($retorno);
                }
                else{
                        $retorno = array();
                        $retorno['mensagem'] = 'Sigla inexistente!';
                        echo json_encode($retorno);
                        
                }
        }
        
        private function search_abbreviation($sigla){
                $consultor = $this->Home->Consultant->query("SELECT * FROM consultants where acronym = '".$sigla."'");
                if ($consultor){                                
                        return $consultor[0]['consultants']['id'];
                }else{          
                        return FALSE;
                }
        }
        
        private function insert_activity($projeto_id, $turno, $data, $consultor, $sigla){
                if ($turno == 'M'){     
                        $this->Home->Activity->query("INSERT INTO `activities`(`description`,`start_hours`, `end_hours`, `start_date`, `status`, `project_id`, `consultant".$consultor."_id`) VALUES ('-Indefinida-','08:00','12:00','".$data."','Planejada','".$projeto_id."','".$sigla."')");
                }else{
                        $this->Home->Activity->query("INSERT INTO `activities`(`description`,`start_hours`, `end_hours`, `start_date`, `status`, `project_id`, `consultant".$consultor."_id`) VALUES ('-Indefinida-','13:00','17:00','".$data."','Planejada','".$projeto_id."','".$sigla."')");
                }
        }
                private function search_activity($project_id, $date, $time){
                if ($time == 'M') {
                        $hours_initial = '01:00';
                        $hours_end = '12:00';
                }
                else{
                        $hours_initial = '12:00';
                        $hours_end = '23:59';
                }
                if ($this->Home->Activity->query('SELECT * FROM activities WHERE activities.start_date = "'.$date.'" AND activities.start_hours >= "'.$hours_initial.'" AND activities.end_hours <= "'.$hours_end.'" AND activities.project_id = '.$project_id)) {
                        return TRUE;
                }
                else{
                        return FALSE;
                }
        }
        private function edition_activity($project_id, $date, $time, $consultant_id, $number_consultant){
                if ($time == 'M') {
                        $hours_initial = '01:00';
                        $hours_end = '12:00';
                }
                else{
                        $hours_initial = '12:00';
                        $hours_end = '23:59';
                }
                if (!$consultant_id) {
                        $this->Home->Activity->query('UPDATE activities SET activities.consultant'.$number_consultant.'_id = NULL WHERE activities.start_date = "'.$date.'" AND activities.start_hours >= "'.$hours_initial.'" AND activities.end_hours <= "'.$hours_end.'" AND activities.project_id = '.$project_id);
                }
                else{
                        $this->Home->Activity->query('UPDATE activities SET activities.consultant'.$number_consultant.'_id = '.$consultant_id.' WHERE activities.start_date = "'.$date.'" AND activities.start_hours >= "'.$hours_initial.'" AND activities.end_hours <= "'.$hours_end.'" AND activities.project_id = '.$project_id);
                }
        } 
        private function check_consultant($project_id, $date, $time){
                if ($time == 'M') {
                        $hours_initial = '01:00';
                        $hours_end = '12:00';
                }
                else{
                        $hours_initial = '12:00';
                        $hours_end = '23:59';
                }
                if ($this->Home->Activity->query('SELECT * FROM activities WHERE (activities.consultant1_id IS NOT NULL OR activities.consultant2_id IS NOT NULL OR activities.consultant3_id IS NOT NULL OR activities.consultant4_id IS NOT NULL) AND activities.start_date = "'.$date.'" AND activities.start_hours >= "'.$hours_initial.'" AND activities.end_hours <= "'.$hours_end.'" AND activities.project_id = '.$project_id)) {
                        return TRUE;
                }
                else{
                        return FALSE;
                }
        }
        private function delete_activity($project_id, $date, $time){
                if ($time == 'M') {
                        $hours_initial = '01:00';
                        $hours_end = '12:00';
                }
                else{
                        $hours_initial = '12:00';
                        $hours_end = '23:59';
                }
                if ($this->Home->Activity->query('DELETE FROM activities WHERE activities.start_date = "'.$date.'" AND activities.start_hours >= "'.$hours_initial.'" AND activities.end_hours <= "'.$hours_end.'" AND activities.project_id = '.$project_id)) {
                        return TRUE;
                }
                else{
                        return FALSE;
                }
        }
 
        public function AjaxListConsultants(){
                $this->layout = 'ajax';
                $this -> set ('consultants', $this->Home->Consultant->find('all', array('conditions'=> array('Consultant.removed !=' => 1),'order'=>array('Consultant.name'))));
                
        }
        
        public function AjaxListConsultantNome($name){
                $this->layout = 'ajax';
                $consultants = $this->Home->Consultant->query("SELECT * FROM consultants WHERE LOWER(name) like LOWER('%" . $name . "%')");
                $this-> set('consultants', $consultants);
        }
 }
?>