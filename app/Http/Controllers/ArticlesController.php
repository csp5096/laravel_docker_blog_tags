<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Auth;

use App\Tag;

use App\User;

use App\Article;

use Illuminate\Http\Request;

// use Request;

use Carbon\Carbon;

use App\Http\Requests;

use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Authentication middleware to prevent non-user article creation.
     * Create a new articles controller instance.
     *
     * @return Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }

    /**
     * Show all articles.
     *
     * @return Response
     */
    public function index()
    {
        // Date Mutator - Query Scope: Published Articles
    	$articles = Article::latest('created_at')->created()->get();

    	// Date Mutator - Query Scope: Unpublished Articles
        // $articles = Article::latest('created_at')->uncreated()->get();

		return view('articles.index', compact('articles'));
    }

    /**
     * Show a single article.
     *
     * @param Article $article
     *
     * @return Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the page to create a new article with tags selection.
     *
     * @return Response
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));
    }

    /**
     * Save a new article
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
       $this->createArticle($request);

        // Session Facade: a flash message that flashes per a page request
        return redirect('articles')->with([
            'flash_message' => 'Your article has been created',
            'flash_message_important' => true
        ]);
    }

    /**
     * Edit an existing article
     *
     * @param Article $article
     *
     * @return Response
     */
    public function edit(Article $article)
    {
        $tags = Tag::lists('name','id');

        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * Update an existing article with Method Injection plus Reflection and Syncing.
     *
     * @param Article $article
     * @param ArticleRequest $request
     * @return Response
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }

    /**
     * Sync up the list of tags in the database with the corresponding article.
     *
     * @param Article $article
     * @param array $tags
     */
    private function syncTags(Article $article, array $tags)
    {
        // tags_id => input('tags')->pivot table syncing
        $article->tags()->sync($tags);
    }

    /**
     * Save a new article.
     *
     * @param ArticleRequest $article
     */
    private function createArticle(ArticleRequest $request)
    {
        // user_id => Auth::user()->id
        $article = Auth::user()->articles()->create($request->all());

        // tags_id => input('tags')->pivot table
        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }
}
