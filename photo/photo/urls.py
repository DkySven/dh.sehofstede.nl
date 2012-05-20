from django.conf.urls import patterns, include, url

# Uncomment the next two lines to enable the admin:
from django.contrib import admin
admin.autodiscover()

urlpatterns = patterns('',
    # Examples:
    # url(r'^photo/', include('photo.foo.urls')),
    url(r'^$', 'website.views.index'),
    url(r'^scripts/', 'website.views.scripts'),
    url(r'^links/', 'website.views.links'),
    url(r'^photo/', 'images.views.show'),

    # Uncomment the admin/doc line below to enable admin documentation:
    url(r'^admin/doc/', include('django.contrib.admindocs.urls')),

    # Uncomment the next line to enable the admin:
    url(r'^admin/', include(admin.site.urls)),
)
