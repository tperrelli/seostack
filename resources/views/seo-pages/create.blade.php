<div class="{!! SeoStack::layout('main_column_class') !!}">
    <div class="card">
        <div class="card-header">SEO Configuration</div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="allow_index" class="control-label">{{ __('Allow search engines to show this content in search results?') }}</label>
                        <select name="allow_index" id="allow_index" class="form-control">
                            <option value="1">YES</option>
                            <option value="0">NO</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="seo_url" class="control-label">{{ __('SEO Slug') }}</label>
                        <input type="text" name="seo_url" class="form-control" value="{{ old('seo_url') }}" />
                    </div>
                </div>
            </div>

            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#seo-tab-1">General Options</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#seo-tab-2">Facbook Options</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#seo-tab-3">Twitter Options</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="seo-tab-1">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="seo_title" class="control-label">{{ __('Seo Title') }}</label>
                                <input type="text" id="seo_title" name="seo_title" class="form-control" value="{{ old('seo_title') }}" placeholder="Seo Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="description" class="control-label">{{ __('Seo Description') }}</label>
                                <textarea name="seo_description" id="seo_description" cols="30" rows="5" class="form-control" placeholder="Seo Description">{{ old('seo_description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="" class="control-label">{{ __('SEO Image') }}</label>
                            <input type="file" name="seo_metas[general][image]" class="form-control-file">
                            <input type="hidden" name="seo_metas[general][type]" value="general">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="seo-tab-2">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="" class="control-label">{{ __('Facebook Title') }}</label>
                                <input type="text" name="seo_metas[facebook][title]" class="form-control" value="{{ old('seo_metas.facebook.title') }}" placeholder="Facebook Seo Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="" class="control-label">{{ __('Facebook Description') }}</label>
                                <textarea name="seo_metas[facebook][description]" cols="30" rows="5" class="form-control" placeholder="Facebook Seo Description">{{ old('seo_metas.facebook.description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="" class="control-label">{{ __('Facebook SEO Image') }}</label>
                            <input type="file" name="seo_metas[facebook][image]" class="form-control-file">
                            <input type="hidden" name="seo_metas[facebook][type]" value="facebook">
                        </div>
                    </div>                    
                </div>
                <div class="tab-pane" id="seo-tab-3">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="" class="control-label">{{ __('Twitter SEO Title') }}</label>
                                <input type="text" name="seo_metas[twitter][title]" class="form-control" value="{{ old('seo_metas.twitter.title') }}" placeholder="Twitter Seo Title">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="" class="control-label">{{ __('Twitter SEO Description') }}</label>
                                <textarea name="seo_metas[twitter][description]" cols="30" rows="5" class="form-control" placeholder="Twitter Seo Description">{{ old('seo_metas.twitter.description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="" class="control-label">{{ __('Twitter Seo Image') }}</label>
                            <input type="file" name="seo_metas[twitter][image]" class="form-control-file">
                            <input type="hidden" name="seo_metas[twitter][type]" value="twitter">
                        </div>
                    </div>                    
                </div>
            </div>

        </div>
    </div>
</div>