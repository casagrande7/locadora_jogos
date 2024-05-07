<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class JogosFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:120|min:5|unique:jogos,nome',
            'preco' => 'required|decimal:12.2',
            'descricao' => 'required|max:800|min:10',
            'classificacao' => 'required|max:20|min:5',
            'plataformas' => 'required|max:60|min:3',
            'desenvolvedor' => 'required|max:120|min:2',
            'distribuidora' => 'required|max:120|min:2',
            'categoria' => 'required|max:55|min:3'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages(){
        return[
            'nome.required' => 'O campo Nome é obrigatório',
            'nome.max' => 'O campo Nome deve conter no máximo 120 caracteres',
            'nome.min' => 'O campo Nome deve conter no mínimo 5 caracteres',
            'nome.unique' => 'Nome já cadastrado no sistema',
            'preco.required' => 'O campo Celular é obrigatório',
            'preco.max' => 'O campo Celular deve conter no máximo 11 caracteres',
            'preco.min' => 'O campo Celular deve conter no mínimo 10 caracteres',
            'email.required' => 'O campo Email é obrigatório',
            'email.max' => 'O campo Email deve conter no máximo 120 caracteres',
            'email.email' => 'Formato de E-mail inválido',
            'email.unique' => 'Email já cadastrado no sistema',
            'cpf.required' => 'O campo CPF é obrigatório',
            'cpf.max' => 'O campo CPF deve conter no máximo 11 caracteres',
            'cpf.min' => 'O campo CPF deve conter no mínimo 11 caracteres',
            'cpf.unique' => 'CPF já cadastrado no sistema',
            'dataNascimento.required' => 'O campo DataNascimento é obrigatório',
            'dataNascimento.date' => 'O campo DataNascimento deve conter só datas',
            'cidade.required' => 'O campo Cidade é obrigatório',
            'cidade.max' => 'O campo Cidade deve conter no máximo 120 caracteres',
            'estado.required' => 'O campo Estado é obrigatório',
            'estado.max' => 'O campo Estado deve conter no máximo 2 caracteres',
            'estado.min' => 'O campo Estado deve conter no mínimo 2 caracteres',
            'pais.required' => 'O campo País é orbigatório',
            'pais.max' => 'O campo País deve conter no máximo 80 caracteres',
            'rua.required' => 'O campo Rua é obrigatório',
            'rua.max' => 'O campo Rua deve conter no máximo 120 caracteres',
            'numero.required' => 'O campo Número é obrigatório',
            'numero.max' => 'O campo Número deve conter no máximo 10 caracteres',
            'bairro.required' => 'O campo Bairro é obrigatório',
            'bairro.max' => 'O campo Bairro deve conter no máximo 100 caracteres',
            'cep.required' => 'O campo CEP é obrigatório',
            'cep.max' => 'O campo CEP deve conter no máximo 8 caracteres',
            'cep.min' => 'O campo CEP deve conter no mínimo 8 caracteres',
            'complemento.max' => 'O campo Complemento deve conter no máximo 150 caracteres',
            'senha.required' => 'O campo Senha é obrigatório',
            'salario.required' => 'O campo Salário é obrigatório',
            'salario.decimal' => 'O campo Salário deve conter apenas valores em decimais'

        ];
}
}