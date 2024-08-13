<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <img src="img/logo.jpg" alt="Le logo des étudiants" width="100">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
    </header>

    <br><br>

    @if (session('alert1'))
        <div class="alert alert-success">
            {{session('alert1')}}
        </div>
    @endif

    <ul>
        @foreach ($errors->all() as $error)
            <li class="alert alert-danger">{{$error}}</li>
        @endforeach
    </ul>

    <main class="container pt-5">
        <form method="POST" action="{{url('insertion_etudiant')}}">
            @csrf 
            <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" id="exampleInputText1" aria-describedby="InputHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" id="exampleInputText1" aria-describedby="InputHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Âge</label>
                <input type="number" name="age" class="form-control" id="exampleInputText1" aria-describedby="InputHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputText1" class="form-label">Classe</label>
                <input type="text" name="classe" class="form-control" id="exampleInputText1" aria-describedby="InputHelp">
            </div>
            
            <button href="/etudiant_page" type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    </main>

    <hr>

    <main class="container">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Âge</th>
                    <th>Classe</th>
                    <th class="fst-italic">Modifier</th>
                    <th class="fst-italic">Supprimer</th>
                    <th class="fst-italic">Voir uniquement</th>
                </tr>
            </thead>

            <tbody>
                @foreach($etudiants as $etudiant)
                <tr>
                    <td>{{$etudiant->id}}</td>
                    <td>{{$etudiant->nom}}</td>
                    <td>{{$etudiant->prenom}}</td>
                    <td>{{$etudiant->age}}</td>
                    <td>{{$etudiant->classe}}</td>

                    <td>
                        <a href="{{url('modifier',$etudiant->id)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> Modifier</a>
                    </td> 

                    <td>
                        <a href="/delete-etudiant/{{{$etudiant->id}}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Supprimer</a>
                    </td>

                    <td>
                        <a href="#" class="btn btn-success"><i class="fa-solid fa-eye"></i> Vue</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>