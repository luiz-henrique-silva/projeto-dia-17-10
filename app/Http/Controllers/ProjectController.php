<?php

namespace App\Http\Controllers;

use App\Models\Project;

class ProjectController extends Controller
{
    // Exibir todos os projetos aprovados
    public function index() {
        $projects = Project::where('status', 'aprovado')->get();
        return view('projects.index', compact('projects'));
    }

    // Exibir formulário de envio de projeto (somente para alunos)
    public function create() {
        return view('projects.create');
    }

    // Salvar solicitação de projeto
    public function store(Request $request) {
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->user_id = auth()->user()->id;
        $project->save();

        return redirect()->route('projects.index')->with('success', 'Projeto enviado com sucesso!');
    }

    // Exibir solicitações de projetos pendentes (somente para professores)
    public function approveIndex() {
        $projects = Project::where('status', 'pendente')->get();
        return view('projects.approve', compact('projects'));
    }

    // Aprovar projeto (somente para professores)
    public function approve(Project $project) {
        $project->status = 'aprovado';
        $project->save();

        return redirect()->route('projects.approve')->with('success', 'Projeto aprovado com sucesso!');
    }
}
