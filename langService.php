<?php

//CRUD
class LangService
{

	private $connect;
	private $language;

	public function __construct(Connect $connect, language $language)
	{
		$this->connect = $connect->conectar();
		$this->language = $language;
	}

	public function inserir()
	{ //create
		$query = 'insert into tb_languages(language)values(:language)';
		$stmt = $this->connect->prepare($query);
		$stmt->bindValue(':language', $this->language->__get('language'));
		$stmt->execute();
	}

	public function recuperar()
	{ //read
		$query = '
			select 
				t.id, s.status, t.language 
			from 
				tb_languages as t
				left join tb_status as s on (t.id_status = s.id)
		';
		$stmt = $this->connect->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function atualizar()
	{ //update

		$query = "update tb_languages set language = ? where id = ?";
		$stmt = $this->connect->prepare($query);
		$stmt->bindValue(1, $this->language->__get('language'));
		$stmt->bindValue(2, $this->language->__get('id'));
		return $stmt->execute();
	}

	public function remover()
	{ //delete

		$query = 'delete from tb_languages where id = :id';
		$stmt = $this->connect->prepare($query);
		$stmt->bindValue(':id', $this->language->__get('id'));
		$stmt->execute();
	}

	public function marcarRealizada()
	{ //update

		$query = "update tb_languages set id_status = ? where id = ?";
		$stmt = $this->connect->prepare($query);
		$stmt->bindValue(1, $this->language->__get('id_status'));
		$stmt->bindValue(2, $this->language->__get('id'));
		return $stmt->execute();
	}

	public function recuperarTarefasPendentes()
	{
		$query = '
			select 
				t.id, s.status, t.language 
			from 
				tb_languages as t
				left join tb_status as s on (t.id_status = s.id)
			where
				t.id_status = :id_status
		';
		$stmt = $this->connect->prepare($query);
		$stmt->bindValue(':id_status', $this->language->__get('id_status'));
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
}

?>