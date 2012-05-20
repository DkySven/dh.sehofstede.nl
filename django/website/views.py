from django.shortcuts import render_to_response

def index(request):
	return render_to_response('index.html')

def scripts(request):
	return render_to_response('scripts.html')

def links(request):
	return render_to_response('links.html')
